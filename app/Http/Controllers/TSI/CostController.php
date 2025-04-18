<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Pokazuje faktury od najnowszych.
     */
    public function index()
    {
        $costs = $this->get_costs();
        $costs_sugestion = $this->get_sugestion_costs();
        $costs_all =  $this->get_all_costs();

        return view('admin.cost.index', compact('costs', 'costs_sugestion', 'costs_all'));
    }
    /**
     * Pokazuje faktury z aktualnego miesiąca od najnowszych.
     */
    public function index_now()
    {
        $currentMonth = now()->month; // Pobiera bieżący miesiąc
        $currentYear = now()->year;   // Pobiera bieżący rok

        $costs = $this->get_costs_by($currentMonth, $currentYear);
        $costs_sugestion = $this->get_sugestion_costs();
        $costs_all =  $this->get_all_costs();

        return view('admin.cost.index', compact('costs', 'costs_sugestion', 'costs_all'));
    }
    /**
     * Pokazuje faktury z poprzedniego miesiąca od najnowszych.
     */
    public function index_last()
    {
        // Pobierz datę dla poprzedniego miesiąca
        $previousMonth = now()->subMonth()->month;  // Poprzedni miesiąc
        $previousMonthYear = now()->subMonth()->year;  // Rok poprzedniego miesiąca

        $costs = $this->get_costs_by($previousMonth, $previousMonthYear);
        $costs_sugestion = $this->get_sugestion_costs();
        $costs_all =  $this->get_all_costs();

        return view('admin.cost.index', compact('costs', 'costs_sugestion', 'costs_all'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Wyszukiwanie faktur na podstawie numeru lub klienta
        $costs = $this->get_costs_by_query($query);

        // Zwracamy faktury jako JSON
        return response()->json($costs);
    }
    /**
     * Pokazuje fakturę.
     */
    public function show(Cost $cost)
    {
        $cost_obj = $cost;
        return view('admin.cost.show', compact('cost', 'cost_obj'));
    }
    /**
     * Pokazuje formularz tworzenia nowej faktury.
     */
    public function create()
    {
        $company = $this->get_company();
        return view('admin.cost.create', compact('company'));
    }
    public function store(Request $request)
    {
        // Tworzenie nowej faktury
        $cost = Cost::create([
            'number' => $request->input('number'),
            'total' => $request->input('total'),
            'due_date' => $request->input('due_date'),
            'notes' => $request->input('notes'),
            'company_id' => $request->input('company_id'),
            'user_id' => auth()->id(),
            // Dodaj inne pola, które są wymagane
        ]);

        // Obsługa przesyłanego pliku
        if ($request->hasFile('attachment')) {
            $fileName = $this->handle_attachment_upload($request->file('attachment'));
            if ($fileName) {
                // Zapisz ścieżkę pliku w bazie danych
                $cost->path = $fileName;
                $cost->save();
            }
        }
        return redirect()->route('cost')->with('success', 'Faktura kosztowa została pomyślnie utworzona!');
    }
    /**
     * Pokazuje formularz edycji istniejącej faktury kosztowej.
     *
     * @param int $id Identyfikator faktury kosztowej
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Znajdź fakturę kosztową po ID
        $cost = Cost::findOrFail($id);

        // Pobierz dane firmy (jeśli są potrzebne do formularza)
        $company = $this->get_company();

        // Zwróć widok edycji z danymi faktury i firmy
        return view('admin.cost.edit', compact('cost', 'company'));
    }

    /**
     * Aktualizuje istniejącą fakturę kosztową w bazie danych.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id Identyfikator faktury kosztowej
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Znajdź fakturę kosztową po ID
        $cost = Cost::findOrFail($id);

        // Aktualizacja danych faktury
        $cost->update([
            'number' => $request['number'],
            'total' => $request['total'],
            'due_date' => $request['due_date'],
            'notes' => $request['notes'],
        ]);

        // Obsługa przesyłanego pliku (jeśli został przesłany nowy plik)
        if ($request->hasFile('attachment')) {
            // Usuń poprzedni plik (jeśli istnieje)
            if ($cost->path && file_exists(public_path('attachments/' . $cost->path))) {
                unlink(public_path('attachments/' . $cost->path));
            }

            // Prześlij nowy plik
            $fileName = $this->handle_attachment_upload($request->file('attachment'));
            if ($fileName) {
                $cost->path = $fileName;
                $cost->save(); // Zapisz nową ścieżkę pliku
            }
        }

        // Przekierowanie z informacją o sukcesie
        return redirect()->route('cost')->with('success', 'Faktura kosztowa została pomyślnie zaktualizowana!');
    }
    /**
     * Usuwa wybraną fakturę kosztową.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Cost $cost)
    {
        // Znajdź fakturę na podstawie ID
        $cost = Cost::findOrFail($cost->id);

        // Usuwanie załącznika, jeśli istnieje
        if ($cost->path) {
            $filePath = public_path('attachments/' . $cost->path);
            if (file_exists($filePath)) {
                unlink($filePath);  // Usuwanie pliku z serwera
            }
        }

        // Usuń fakturę z bazy danych
        $cost->delete();

        return redirect()->route('cost')->with('success', 'Faktura kosztowa została pomyślnie usunięta!');
    }
}
