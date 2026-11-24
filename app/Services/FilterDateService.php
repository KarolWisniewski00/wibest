<?php

namespace App\Services;

use App\Repositories\WorkSessionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class FilterDateService
{
    /** Normalize month-only views to the month containing the range start. */
    public function fullMonth(Request $request, string $start, string $end): array
    {
        $month = \Carbon\Carbon::parse($start)->startOfMonth();
        $dates = [$month->toDateString(), $month->copy()->endOfMonth()->toDateString()];
        $session = $request->hasSession() ? $request->session() : session();
        if ($dates !== [$start, $end]) {
            $session->flash('date_range_info', 'Skorygowano zakres dat na pełny miesiąc: '.$month->format('m.Y').'.');
        }
        $session->put(['start_date' => $dates[0], 'end_date' => $dates[1]]);
        $request->merge(['start_date' => $dates[0], 'end_date' => $dates[1]]);

        return $dates;
    }

    /**
     * Ustawia zmienna sesyjną filtra daty start_date i end_date.
     *
     * @param Request $request
     * @return void
     */
    public function initFilterDate(Request $request): void
    {
        $request->session()->put('start_date', $request->input('start_date'));
        $request->session()->put('end_date', $request->input('end_date'));
    }
    /**
     * Ustawia zmienna sesyjną filtra daty start_date i end_date.
     *
     * @param Request $request
     * @return void
     */
    public function initFilterDateIfNotExist(Request $request): void
    {
        if (!$request->session()->has('start_date') || !$request->session()->has('end_date')) {
            $startOfMonth = now()->startOfMonth()->toDateString();
            $endOfMonth = now()->endOfMonth()->toDateString();

            $request->session()->put('start_date', $startOfMonth);
            $request->session()->put('end_date', $endOfMonth);
        }
    }
    /**
     * Zwraca daty z sesji w domyślnym formacie d.m.y.
     *
     * @param Request $request
     * @param string $format
     * @return array
     */
    public function getRangeDateFilter(Request $request, ?string $format = 'd.m.y'): array
    {
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');
        
        $dates = [];
        $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startDate);
        $endDateCarbon = \Carbon\Carbon::createFromFormat('Y-m-d', $endDate);

        while ($currentDate->lte($endDateCarbon)) {
            $dates[] = $currentDate->format($format);
            $currentDate->addDay();
        }

        return $dates;
    }
    /**
     * Zwraca datę startową z sesji.
     *
     * @param Request $request
     * @return string
     */
    public function getStartDateDateFilter(Request $request): string
    {
        return $request->session()->get('start_date');
    }
    /**
     * Zwraca datę końcową z sesji.
     *
     * @param Request $request
     * @return string
     */
    public function getEndDateDateFilter(Request $request): string
    {
        return $request->session()->get('end_date');
    }
}
