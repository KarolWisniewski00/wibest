<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie faktury dla bieżącej firmy
        $invoices = Invoice::where('company_id', $this->get_company_id())
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
        }

        // Uporządkuj dane w tablicach
        $dates = array_keys($dailyTotals);
        $totalValues = array_values($dailyTotals);
        $subTotalValues = array_values($dailySubTotals);
        $documentCounts = array_values($dailyCounts); // Liczba dokumentów

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
            'documentCounts' // Przekazanie liczby dokumentów
        ));
    }




    public function version()
    {
        return view('admin.version.index');
    }
}
