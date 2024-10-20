<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Cost;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie faktury dla bieżącej firmy, z wyjątkiem faktur proforma
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->where('invoice_type', '!=', 'faktura proforma') // Dodaj warunek, aby wykluczyć faktury proforma
            ->orderBy('created_at', 'desc')
            ->get(); // Pobieramy wszystkie faktury bez paginacji dla obliczeń

        // Obliczenia
        $todayTotal = $invoices->where('created_at', '>=', now()->startOfDay())->sum('total');
        $todayCount = $invoices->where('created_at', '>=', now()->startOfDay())->count();

        $last7DaysTotal = $invoices->where('created_at', '>=', now()->subDays(7))->sum('total');
        $last7DaysCount = $invoices->where('created_at', '>=', now()->subDays(7))->count();

        $currentMonthTotal = $invoices->where('created_at', '>=', now()->startOfMonth())->sum('total');
        $currentMonthCount = $invoices->where('created_at', '>=', now()->startOfMonth())->count();

        $previousMonthTotal = $invoices->where('created_at', '>=', now()->subMonth()->startOfMonth())
            ->where('created_at', '<', now()->startOfMonth())->sum('total');
        $previousMonthCount = $invoices->where('created_at', '>=', now()->subMonth()->startOfMonth())
            ->where('created_at', '<', now()->startOfMonth())->count();

        $currentYearTotal = $invoices->where('created_at', '>=', now()->startOfYear())->sum('total');
        $currentYearCount = $invoices->where('created_at', '>=', now()->startOfYear())->count();

        // Dodaj dane do wykresu
        $dailyTotals = [];
        $dailySubTotals = [];
        $dailyCounts = []; // Tablica do zliczania dokumentów

        // Zliczanie danych dla kosztów
        $costs = Cost::where('company_id', $this->get_company_id())
            ->where('created_at', '>=', now()->subDays(31)) // Ostatnie 31 dni
            ->orderBy('created_at', 'desc')
            ->get();
        // Inicjalizacja tablic na 31 dni
        $dailyCostTotals = [];
        $dailyCostCounts = [];

        for ($i = 0; $i < 31; $i++) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dailyCostTotals[$date] = 0;
            $dailyCostCounts[$date] = 0; // Inicjalizuj liczbę dokumentów
        }
        // Zliczanie sum dla każdego dnia
        foreach ($costs as $cost) {
            $date = $cost->created_at->format('Y-m-d');
            $dailyCostTotals[$date] += $cost->total; // sumuj total
            $dailyCostCounts[$date]++; // zwiększ licznik dokumentów
        }

        // Uporządkuj dane w tablicach
        $costDates = array_keys($dailyCostTotals);
        $costTotalValues = array_values($dailyCostTotals);
        $costDocumentCounts = array_values($dailyCostCounts); // Liczba dokumentów

        // Odwróć tablice, aby daty były od najstarszych
        $costDates = array_reverse($costDates);
        $costTotalValues = array_reverse($costTotalValues);
        $costDocumentCounts = array_reverse($costDocumentCounts); // Odwróć liczbę dokumentów

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


        // Przekazanie danych do widoku
        return view('dashboard', compact(
            'todayTotal',
            'todayCount',
            'last7DaysTotal',
            'last7DaysCount',
            'currentMonthTotal',
            'currentMonthCount',
            'previousMonthTotal',
            'previousMonthCount',
            'currentYearTotal',
            'currentYearCount',
            'dates',
            'totalValues',
            'subTotalValues',
            'documentCounts', // Przekazanie liczby dokumentów
            'costDates',
            'costTotalValues',
            'costDocumentCounts' // Przekazanie liczby dokumentów kosztów
        ));
    }




    public function version()
    {
        return view('admin.version.index');
    }
}
