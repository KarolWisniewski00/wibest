<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\SentMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    /**
     * Pokazuje klientów.
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($companies as $key => $company) {
            $company->msg = SentMessage::where('company_id', $company->id)->orderByDesc('created_at')->get();
        }

        return view('admin.client.index', compact('companies'));
    }

    public function get(Request $request)
    {
        $clients = Company::orderBy('created_at', 'desc')
            ->paginate(10);

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
    public function show(Company $client)
    {
        $users = User::where('company_id', $client->id)->get();
        $msg = SentMessage::where('company_id', $client->id)->orderByDesc('created_at')->get();
        $msg_paginate = SentMessage::where('company_id', $client->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.client.show', compact('client', 'users', 'msg', 'msg_paginate'));
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
}
