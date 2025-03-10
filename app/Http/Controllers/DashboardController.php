<?php

namespace App\Http\Controllers;

use App\Mail\DailyReportMail;
use App\Models\Client;
use App\Models\Cost;
use App\Models\Invoice;
use App\Models\User;
use App\Models\WorkSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie faktury dla bieżącej firmy, z wyjątkiem faktur proforma
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->where('invoice_type', '!=', 'faktura proforma')
            ->where('created_at', '>=', now()->subDays(31)) // Dodajemy warunek daty
            ->orderBy('created_at', 'desc')
            ->get();

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

        //////////////////////////
        $company_id = $this->get_company_id();
        $user_id = Auth::id();
        $work_sessions_all = $this->get_all_work_sessions();
        $work_sessions_logged_user = $this->get_work_sessions_logged_user_by_get();
        $user = User::where('id', $user_id)->first();
        // Zlicz sumę 'time_in_work' w formacie HH:mm:ss
        $total_time_in_seconds = 0;
        foreach ($work_sessions_all as $session) {
            $timeParts = explode(':', $session->time_in_work);
            if (count($timeParts) === 3) {
                list($hours, $minutes, $seconds) = $timeParts;
                $total_time_in_seconds += $hours * 3600 + $minutes * 60 + $seconds;
            }
        }
        // Przelicz sumę na godziny
        $total_time_in_hours_all = floor($total_time_in_seconds / 3600);

        // Zlicz sumę 'time_in_work' w formacie HH:mm:ss
        $total_time_in_seconds = 0;
        foreach ($work_sessions_logged_user as $session) {
            $timeParts = explode(':', $session->time_in_work);
            if (count($timeParts) === 3) {
                list($hours, $minutes, $seconds) = $timeParts;
                $total_time_in_seconds += $hours * 3600 + $minutes * 60 + $seconds;
            }
        }
        // Przelicz sumę na godziny
        $total_time_in_hours_logged_user = floor($total_time_in_seconds / 3600);

        // Przekazanie danych do widoku
        return view('dashboard', compact(
            'company_id',
            'user_id',
            'user',
            'work_sessions_all',
            'work_sessions_logged_user',
            'total_time_in_hours_all',
            'total_time_in_hours_logged_user',
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
