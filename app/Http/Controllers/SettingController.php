<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Invitation;
use App\Models\SentMessage;
use App\Models\User;
use App\Models\UserCompanyHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Pokazuje ustawień.
     */
    public function index(Request $request)
    {
        $companyId = $this->get_company_id();
        $users = User::withoutGlobalScope('no_crm')->where('company_id', $companyId)->get();
        $users_calc = UserCompanyHistory::where('company_id', $companyId)->get();
        $client = Company::where('id', $companyId)->first();
        $msg_email = SentMessage::where('company_id', $companyId)->where('type', 'email')->orderByDesc('created_at')->get();

        $year = $request->get('year', Carbon::now()->year);

        $labels = [];
        $activeData = [];
        $hiringData = [];
        $billingData = [];

        // Iteracja po 12 miesiącach - obliczamy 3 serie danych
        for ($m = 1; $m <= 12; $m++) {
            // Ustawiamy koniec miesiąca na ostatnią sekundę dnia: 2026-05-31 23:59:59
            $date = Carbon::create($year, $m, 1)->endOfMonth();
            $labels[] = $date->format('m.Y');

            // 1. Aktywni: assigned_at <= 31.05.2026 23:59:59
            $activeData[] = UserCompanyHistory::where('company_id', $companyId)
                ->whereNotNull('assigned_at')
                ->where('assigned_at', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('unassigned_at')
                        ->orWhere('unassigned_at', '>=', $date);
                })->count();

            // 2. Praca: employment_start <= 31.05.2026 23:59:59
            $hiringData[] = UserCompanyHistory::where('company_id', $companyId)
                ->whereNotNull('employment_start')
                ->where('employment_start', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('employment_end')
                        ->orWhere('employment_end', '>=', $date);
                })->count();

            // 3. Naliczanie: paid_from <= 31.05.2026 23:59:59
            $billingData[] = UserCompanyHistory::where('company_id', $companyId)
                ->whereNotNull('paid_from')
                ->where('paid_from', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('paid_to')
                        ->orWhere('paid_to', '>=', $date);
                })->count();
        }

        $totalUser = UserCompanyHistory::where('company_id', $companyId)->count();
        $totalAmount = UserCompanyHistory::where('company_id', $companyId)->sum('user_price');

        foreach ($users_calc as $user_calc) {
            $user_calc->user_id = User::withoutGlobalScope('no_crm')->where('id', $user_calc->user_id)->first();
            if ($user_calc->user_id == null) {
                $user_calc->user_id = (object)[
                    'name' => 'Usunięto',
                    'role' => null,
                    'profile_photo_url' => 'https://ui-avatars.com/api/?name=U&color=7F9CF5&background=EBF4FF'
                ];
            }
        }

        // Przekazujemy 'data' jako tablicę z trzema kluczami, aby widok Blade mógł je łatwo użyć
        $data = [
            'active' => $activeData,
            'hiring' => $hiringData,
            'billing' => $billingData
        ];

        return view('admin.setting.index', compact('users', 'users_calc', 'client', 'msg_email', 'year', 'labels', 'data', 'totalUser', 'totalAmount'));
    }

    public function userStats(Request $request)
    {
        $companyId = $this->get_company_id();
        $year = $request->get('year', Carbon::now()->year);

        $labels = [];
        $activeData = [];
        $hiringData = [];
        $billingData = [];

        for ($m = 1; $m <= 12; $m++) {
            // Ustawiamy koniec miesiąca na ostatnią sekundę dnia: 2026-05-31 23:59:59
            $date = Carbon::create($year, $m, 1)->endOfMonth();
            $labels[] = $date->format('m.Y');

            // 1. Aktywni: assigned_at <= 31.05.2026 23:59:59
            $activeData[] = UserCompanyHistory::where('company_id', $companyId)
                ->whereNotNull('assigned_at')
                ->where('assigned_at', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('unassigned_at')
                        ->orWhere('unassigned_at', '>=', $date);
                })->count();

            // 2. Praca: employment_start <= 31.05.2026 23:59:59
            $hiringData[] = UserCompanyHistory::where('company_id', $companyId)
                ->whereNotNull('employment_start')
                ->where('employment_start', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('employment_end')
                        ->orWhere('employment_end', '>=', $date);
                })->count();

            // 3. Naliczanie: paid_from <= 31.05.2026 23:59:59
            $billingData[] = UserCompanyHistory::where('company_id', $companyId)
                ->whereNotNull('paid_from')
                ->where('paid_from', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('paid_to')
                        ->orWhere('paid_to', '>=', $date);
                })->count();
        }

        $totalUser = UserCompanyHistory::where('company_id', $companyId)->count();
        $totalAmount = UserCompanyHistory::where('company_id', $companyId)->sum('user_price');

        return response()->json([
            'labels' => $labels,
            'data' => [
                'active' => $activeData,
                'hiring' => $hiringData,
                'billing' => $billingData
            ],
            'totalUser' => $totalUser,
            'totalAmount' => $totalAmount,
        ]);
    }

    /**
     * Pokazuje formularz tworzenia ustawień.
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Zapisuje dane ustawień.
     */
    public function store(StoreCompanyRequest $request)
    {
        $id = auth()->id();
        $user = User::where('id', $id)->first();
        $isExist = Company::where('vat_number', $request->vat_number)->first();
        if ($isExist) {
            $isSend = Invitation::where('user_id', $user->id)->where('company_id', $isExist->id)->first();
            if ($isSend) {
                return redirect()->route('setting')
                    ->with('fail', 'Firma o podanym numerze NIP już istnieje')
                    ->with('success', 'Oczekiwanie na akceptację');
            } else {
                Invitation::create([
                    'user_id' => $user->id,
                    'company_id' => $isExist->id,
                    'status' => 'oczekujący',
                ]);
                return redirect()->route('setting')
                    ->with('fail', 'Firma o podanym numerze NIP już istnieje')
                    ->with('success', 'Wysłano zaproszenie, po zaakceptowaniu automatycznie twoje konto dołączy do firmy');
            }
        }
        // Tworzenie nowej firmy
        $res = Company::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'vat_number' => $request->vat_number,
        ]);
        $user->update([
            'company_id' => $res->id,
            'role' => 'admin',
        ]);
        $user->save();

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('setting')->with('success', 'Firma została dodana.');
        } else {
            return redirect()->route('setting')->with('fail', 'Coś poszło nie tak.');
        }
    }

    /**
     * Pokazuje formularz edytowania ustawień.
     */
    public function edit(Company $company)
    {
        return view('admin.setting.edit', compact('company'));
    }

    /**
     * Zaktualizuj dane ustawień.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // Aktualizacja firmy
        $res = $company->update([
            'name' => $request->name,
            'adress' => $request->adress,
            'vat_number' => $request->vat_number,
        ]);

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('setting')->with('success', 'Firma została zaktualizowana.');
        } else {
            return redirect()->route('setting')->with('fail', 'Coś poszło nie tak.');
        }
    }
    public function acceptInvitation($id)
    {
        $invitation = Invitation::where('user_id', $id)->first();

        if (!$invitation) {
            return redirect()->route('setting')->with('fail', 'Zaproszenie nie istnieje.');
        }

        if ($invitation->status !== 'oczekujący') {
            return redirect()->route('setting')->with('fail', 'Zaproszenie straciło ważność.');
        }

        // Accept the invitation
        $invitation->delete();

        // Assign the user to the company
        $user = $invitation->user;
        $user->company_id = $invitation->company_id;
        $user->role = 'użytkownik';
        $user->save();

        return redirect()->route('setting')->with('success', 'Zaakceptowano zaproszenie.');
    }
    public function rejectInvitation($id)
    {
        $invitation = Invitation::where('user_id', $id)->first();
        if (!$invitation) {
            return redirect()->route('setting')->with('fail', 'Zaproszenie nie istnieje.');
        }
        $invitation->delete();

        return redirect()->route('setting')->with('success', 'Odrzucono zaproszenie.');
    }

}
