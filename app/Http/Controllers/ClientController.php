<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Pokazuje klientów.
     */
    public function index()
    {
        // Pobranie identyfikatora zalogowanego użytkownika
        $userId = auth()->id();
    
        // Pobranie informacji o firmie zalogowanego użytkownika
        $userCompany = User::find($userId)->company_id;
    
        // Pobranie klientów należących do tej samej firmy, z paginacją
        $clients = Client::where('company_id', $userCompany)->paginate(10);
    
        return view('admin.client.index', compact('clients'));
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
        // Walidacja danych
        $validatedData = $request->validated();
        $user = User::where('id',auth()->id())->first();
        // Tworzenie nowego obiektu klienta
        $client = new Client();
        $client->name = $validatedData['name'];
        $client->email = $validatedData['email'];
        $client->email2 = $validatedData['email2'];
        $client->phone = $validatedData['phone'];
        $client->phone2 = $validatedData['phone2'];
        $client->vat_number = $validatedData['tax_id'];
        $client->adress = $validatedData['adress'];
        $client->notes = $validatedData['notes'];
        $client->user_id = $user->id;
        $client->company_id = $user->company_id;

        // Przechowywanie danych w bazie
        $res = $client->save();

        // Sprawdzanie, czy klient został zapisany pomyślnie
        if ($res) {
            // Przekierowanie do listy klientów z komunikatem o sukcesie
            return redirect()->route('client')->with('success', 'Klient został pomyślnie dodany.');
        } else {
            // Przekierowanie z powrotem do formularza z komunikatem o błędzie
            return redirect()->route('client.create')->with('fail', 'Wystąpił błąd podczas dodawania klienta. Proszę spróbować ponownie.');
        }
    }
    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }
    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }
    /**
     * Zaktualizuj dane klienta.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $validatedData = $request->validated();

        // Próbuj zaktualizować dane klienta
        $res = $client->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'email2' => $validatedData['email2'],
            'phone' => $validatedData['phone'],
            'phone2' => $validatedData['phone2'],
            'vat_number' => $validatedData['tax_id'],
            'adress' => $validatedData['adress'],
            'notes' => $validatedData['notes'],
        ]);

        // Sprawdzanie, czy klient został zaktualizowany pomyślnie
        if ($res) {
            // Przekierowanie do listy klientów z komunikatem o sukcesie
            return redirect()->route('client')->with('success', 'Klient został pomyślnie zaktualizowany.');
        } else {
            // Przekierowanie z powrotem do formularza z komunikatem o błędzie
            return redirect()->route('client.edit')->with('fail', 'Wystąpił błąd podczas aktualizacji klienta. Proszę spróbować ponownie.');
        }
    }
    public function delete(Client $client)
    {
        $res = $client->delete();
        if ($res) {
            return redirect()->route('client')->with('success', 'Produkt został usunięty.');
        } else {
            return redirect()->route('client')->with('fail', 'Wystąpił błąd podczas usuwania klienta. Proszę spróbować ponownie.');
        }
    }
}
