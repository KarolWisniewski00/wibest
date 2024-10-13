<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Invoice;
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
        $clients = Client::where('company_id', $this->get_company_id())->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Pokazuje klienta.
     */
    public function show(Client $client)
    {
        // Pobieranie faktur związanych z klientem
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->where('client_id', $client->id)
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->paginate(10);

        // Dodaj dane do wykresu
        $dailyTotals = [];
        $dailySubTotals = [];
        $dailyCounts = []; // Tablica do zliczania dokumentów

        // Dodaj dane do informacji
        $dailyTotalsCount = 0;
        $dailySubTotalsCount = 0;
        $dailyCountsCount = 0;

        // Inicjalizacja tablic na 31 dni
        for ($i = 0; $i < 31; $i++) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dailyTotals[$date] = 0;
            $dailySubTotals[$date] = 0;
            $dailyCounts[$date] = 0; // Inicjalizuj liczbę dokumentów
        }

        // Zliczanie sum dla każdego dnia
        foreach ($invoices as $invoice) {
            $date = $invoice->created_at->format('Y-m-d');
            $dailyTotals[$date] += $invoice->total; // sumuj total
            $dailySubTotals[$date] += $invoice->subtotal; // sumuj sub_total
            $dailyCounts[$date]++; // zwiększ licznik dokumentów

            $dailyTotalsCount += $dailyTotals[$date] + $invoice->total;
            $dailySubTotalsCount += $dailySubTotals[$date] + $invoice->subtotal;
            $dailyCountsCount += 1;
        }

        // Uporządkuj dane w tablicach
        $dates = array_keys($dailyTotals);
        $totalValues = array_values($dailyTotals);
        $subTotalValues = array_values($dailySubTotals);
        $documentCounts = array_values($dailyCounts); // Liczba dokumentów

        // Odwróć tablice, aby daty były od najstarszych
        $dates = array_reverse($dates);
        $totalValues = array_reverse($totalValues);
        $subTotalValues = array_reverse($subTotalValues);
        $documentCounts = array_reverse($documentCounts); // Odwróć liczbę dokumentów
        
        // Przekazanie klienta oraz jego faktur do widoku
        return view('admin.client.show', compact(
            'client',
            'invoices',
            'dates',
            'totalValues',
            'subTotalValues',
            'documentCounts',
            'dailyTotalsCount',
            'dailySubTotalsCount',
            'dailyCountsCount'
        ));
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

        $user = User::where('id', auth()->id())->first();
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
            return redirect()->route('client')->with('success', 'Klient został pomyślnie dodany.');
        } else {
            return redirect()->route('client.create')->with('fail', 'Wystąpił błąd podczas dodawania klienta. Proszę spróbować ponownie.');
        }
    }

    /**
     * Pokazuje formularz edycji klienta.
     */
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
            return redirect()->route('client')->with('success', 'Klient został pomyślnie zaktualizowany.');
        } else {
            return redirect()->route('client.edit')->with('fail', 'Wystąpił błąd podczas aktualizacji klienta. Proszę spróbować ponownie.');
        }
    }

    /**
     * Usuwa klienta.
     */
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
