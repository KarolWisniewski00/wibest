<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Metoda do wyświetlania
    public function index()
    {
        // Oblicz początek i koniec bieżącego miesiąca
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Pobierz liczbę nowych klientów z bieżącego miesiąca
        $newClientsCount = Client::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        return view('dashboard', compact('newClientsCount'));
    }
    public function version()
    {
        return view('admin.version.index');
    }
}
