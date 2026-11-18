<?php

namespace App\Services;

use App\Mail\TeamUserCreated;
use App\Mail\UserMail;
use App\Models\User;
use App\Models\UserCompanyHistory;
use App\Support\CrmTechnicalEmail;
use App\Support\UserCreationAccess;
use App\Support\UserInput;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CreateUser
{
    public function create(array $input, int $companyId, bool $clients = false, bool $crm = false): User
    {
        UserCreationAccess::authorize($companyId, $clients);
        $rules = UserInput::rules($crm);
        if (! $crm) {
            $rules['role'] = ['required', Rule::in(['admin', 'kierownik', 'użytkownik'])];
            $rules['gender'] = ['required', 'boolean'];
            $rules['supervisor_id'] = ['required', Rule::exists('users', 'id')->where('company_id', $companyId)->whereIn('role', ['admin', 'menedżer', 'właściciel'])];
        }
        $data = Validator::make(UserInput::normalize($input), $rules, UserInput::messages())->validate();
        $password = Str::random(16);
        $technicalEmail = $crm && empty($data['email']);
        for ($attempt = 0; $attempt < 3; $attempt++) {
            if ($technicalEmail) {
                $data['email'] = CrmTechnicalEmail::generate();
            }
            try {
                return DB::transaction(function () use ($data, $companyId, $clients, $crm, $password) {
                    $user = new User;
                    $user->name = $data['name'] ?? 'Użytkownik CRM';
                    $user->email = $data['email'];
                    $user->phone = $data['phone'] ?? null;
                    $user->position = $data['position'] ?? null;
                    $user->company_id = $companyId;
                    $user->role = $crm ? 'CRM' : $data['role'];
                    if (! $crm) {
                        $user->gender = $data['gender'] ? 'male' : 'female';
                        $user->supervisor_id = $data['supervisor_id'];
                    }
                    $user->password = Hash::make($password);
                    $user->save();
                    UserCompanyHistory::create([
                        'company_id' => $companyId, 'user_id' => $user->id,
                        'assigned_at' => now(), 'paid_from' => now()->startOfMonth(),
                        'user_price' => $crm ? 0 : $user->company->user_price,
                    ]);
                    DB::afterCommit(function () use ($user, $password, $crm, $clients) {
                        if (! $crm && ! CrmTechnicalEmail::isTechnical($user->email)) {
                            try {
                                Mail::to($user->email)->send(new UserMail($user, $password));
                            } catch (\Throwable $e) {
                                Log::warning('User welcome email failed.', ['user_id' => $user->id, 'exception' => get_class($e)]);
                            }
                        }
                        if (! $clients && ! $crm) {
                            try {
                                Mail::to('biuro@wibest.pl')->queue(new TeamUserCreated([
                                    'company' => $user->company->name,
                                    'name' => $user->name,
                                    'email' => $user->contact_email,
                                    'role' => $user->role,
                                    'created_at' => $user->created_at->copy()->timezone('Europe/Warsaw')->format('d.m.Y H'),
                                ], $user->id));
                            } catch (\Throwable $e) {
                                Log::warning('Team user notification failed.', ['user_id' => $user->id, 'exception' => get_class($e)]);
                            }
                        }
                    });

                    return $user;
                });
            } catch (QueryException $e) {
                if (! empty($data['email']) && in_array((string) $e->getCode(), ['23000', '23505'], true)
                    && DB::table('users')->whereRaw('LOWER(TRIM(email)) = ?', [$data['email']])->exists()) {
                    if ($technicalEmail && $attempt < 2) {
                        continue;
                    }
                    throw ValidationException::withMessages(['email' => 'Ten adres e-mail jest już wykorzystywany.']);
                }
                throw $e;
            }
        }
    }
}
