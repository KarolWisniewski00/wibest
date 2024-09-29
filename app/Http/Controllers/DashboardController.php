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
            'currentYearCount'
        ));
    }

    public function version()
    {
        return view('admin.version.index');
    }
}
