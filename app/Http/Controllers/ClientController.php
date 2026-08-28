<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\SentMessage;
use App\Models\User;
use App\Models\UserCompanyHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    /**
     * Pokazuje klientów.
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')
            ->paginate(3);

        foreach ($companies as $key => $company) {
            $company->msg = SentMessage::where('company_id', $company->id)->orderByDesc('created_at')->get();
        }

        return view('admin.client.index', compact('companies'));
    }

    public function get(Request $request)
    {
        $clients = Company::orderBy('created_at', 'desc')
            ->paginate(3);

        $rows_table = [];
        $rows_list = [];
        foreach ($clients as $client) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-client', ['client' => $client])->render());
            array_push($rows_list, View::make('components.card-client', ['client' => $client])->render());
        }

        return response()->json([
            'data' => $clients->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $clients->nextPageUrl(),
        ]);
    }

    /**
     * Pokazuje klienta.
     */
    public function show(Request $request, Company $client)
    {
        $companyId = $client->id;
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

        return view('admin.client.show', compact('users', 'users_calc', 'client', 'msg_email', 'year', 'labels', 'data', 'totalUser', 'totalAmount'));
    }
    public function userStats(Request $request, Company $client)
    {
        $companyId = $client->id;
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
    public function sms(Request $request, Company $client)
    {
        $companyId = $client->id;
        $users = User::withoutGlobalScope('no_crm')->where('company_id', $companyId)->get();
        $users_calc = UserCompanyHistory::where('company_id', $companyId)->get();
        $client = Company::where('id', $companyId)->first();
        $user_id = auth()->id();
        $user = User::withoutGlobalScope('no_crm')->where('id', $user_id)->first();
        $msg_sms = SentMessage::where('company_id', $companyId)->where('type', 'sms')->orderByDesc('created_at')->get();
        if ($user->role == 'admin' || $user->role == 'menedżer' || $user->role == 'właściciel')
            $msg_paginate = SentMessage::where('company_id', $companyId)->where('type', 'sms')->orderByDesc('created_at')->paginate(10);
        else {
            $msg_paginate = SentMessage::where('company_id', $companyId)->where('type', 'sms')->where('user_id', $user_id)->orderByDesc('created_at')->paginate(10);
        }

        $month = $request->get('month', Carbon::now()->format('Y-m'));
        $start = Carbon::parse($month . '-01')->startOfMonth();
        $end = Carbon::parse($month . '-01')->endOfMonth();

        $query = SentMessage::where('company_id', $companyId)
            ->where('type', 'sms')
            ->where('status', 'QUEUE')
            ->whereBetween('created_at', [$start, $end]);

        // 📊 wykres (dni)
        $smsStats = $query->clone()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->pluck('count', 'date');

        // 🔢 suma SMS
        $totalSms = $query->count();

        // 💰 suma kwoty (zmień 'price' jeśli masz inną nazwę)
        $totalAmount = $query->sum('price');

        $labels = [];
        $data = [];

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d.m');
            $data[] = $smsStats[$key] ?? 0;
        }
        return view('admin.client.sms', compact('users', 'client', 'msg_paginate', 'msg_sms', 'month', 'labels', 'data', 'totalSms', 'totalAmount'));
    }
    public function smsStats(Request $request, Company $client)
    {
        $companyId = $client->id;

        $month = $request->get('month');
        $start = Carbon::parse($month . '-01')->startOfMonth();
        $end = Carbon::parse($month . '-01')->endOfMonth();

        $query = SentMessage::where('company_id', $companyId)
            ->where('type', 'sms')
            ->where('status', 'QUEUE')
            ->whereBetween('created_at', [$start, $end]);

        // 📊 wykres (dni)
        $smsStats = $query->clone()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->pluck('count', 'date');

        // 🔢 suma SMS
        $totalSms = $query->count();

        // 💰 suma kwoty (zmień 'price' jeśli masz inną nazwę)
        $totalAmount = $query->sum('price');

        $labels = [];
        $data = [];

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d.m');
            $data[] = $smsStats[$key] ?? 0;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'totalSms' => $totalSms,
            'totalAmount' => $totalAmount,
        ]);
    }
    /**
     * Pokazuje formularz tworzenia nowego klienta.
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Zapisuje nowego klienta w bazie danych.
     */
    public function store(StoreClientRequest $request)
    {
        // Tworzenie nowego obiektu klienta
        $client = new Company();
        $client->name = $request->name;
        $client->vat_number = $request->vat_number;
        $client->adress = $request->adress;
        $client->created_user_id = Auth::id();

        // Przechowywanie danych w bazie
        $res = $client->save();

        // Sprawdzanie, czy klient został zapisany pomyślnie
        if ($res) {
            return redirect()->route('setting.client')->with('success', 'Klient został pomyślnie dodany.');
        } else {
            return redirect()->route('setting.client.create')->with('fail', 'Wystąpił błąd podczas dodawania klienta. Proszę spróbować ponownie.');
        }
    }

    /**
     * Pokazuje formularz edycji klienta.
     */
    public function edit(Company $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    /**
     * Zaktualizuj dane klienta.
     */
    public function update(UpdateClientRequest $request, Company $client)
    {

        // Próbuj zaktualizować dane klienta
        $res = $client->update([
            'name' => $request->name,
            'vat_number' => $request->vat_number,
            'adress' => $request->adress,
        ]);

        // Sprawdzanie, czy klient został zaktualizowany pomyślnie
        if ($res) {
            return redirect()->route('setting.client')->with('success', 'Klient został pomyślnie zaktualizowany.');
        } else {
            return redirect()->route('setting.client.edit')->with('fail', 'Wystąpił błąd podczas aktualizacji klienta. Proszę spróbować ponownie.');
        }
    }

    /**
     * Usuwa klienta.
     */
    public function delete(Company $client)
    {
        $res = $client->delete();
        if ($res) {
            return redirect()->route('setting.client')->with('success', 'Produkt został usunięty.');
        } else {
            return redirect()->route('setting.client')->with('fail', 'Wystąpił błąd podczas usuwania klienta. Proszę spróbować ponownie.');
        }
    }
    public function users(Company $client)
    {
        $companyId = $client->id;
        return User::withoutGlobalScope('no_crm')->where('company_id', $companyId)->get();
    }
}
