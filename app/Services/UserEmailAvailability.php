<?php

namespace App\Services;

use App\Models\User;
use App\Support\UserCreationAccess;
use App\Support\UserInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class UserEmailAvailability
{
    public function check($email, $companyId, bool $clients): array
    {
        UserCreationAccess::authorize($companyId, $clients);
        return $this->availability($email);
    }

    public function checkForUser($email, User $user): array
    {
        $actor = Auth::user();
        abort_unless($actor?->role === 'właściciel'
            || ($actor?->role === 'admin' && $user->company && $user->role !== 'CRM'
                && (int) $actor->company_id === (int) $user->company_id), 403);
        return $this->availability($email, $user->id);
    }

    private function availability($email, ?int $ignoreUserId = null): array
    {
        $key = 'user-email:'.Auth::id();
        if (RateLimiter::tooManyAttempts($key, 60)) {
            return ['status' => 'error', 'message' => 'Zbyt wiele zapytań. Spróbuj ponownie za chwilę.'];
        }
        RateLimiter::hit($key, 60);
        $data = UserInput::normalize(['email' => $email]);
        $validator = Validator::make($data, ['email' => UserInput::rules(false, $ignoreUserId)['email']], UserInput::messages());

        return $validator->fails()
            ? ['status' => 'error', 'message' => $validator->errors()->first('email')]
            : ['status' => 'success', 'message' => 'Adres e-mail jest poprawny i dostępny.'];
    }
}
