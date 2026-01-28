<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\WorkBlock;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    /**
     * Zwraca użytkowników dla admina.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByAdmin(): \Illuminate\Pagination\LengthAwarePaginator
    {
        return User::where('company_id', Auth::user()->company_id)
            ->where('role', '!=', null)
            ->paginate(10);
    }
    /**
     * Zwraca użytkowników dla menadżera.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByManager(): \Illuminate\Pagination\LengthAwarePaginator
    {
        return User::where('company_id', Auth::user()->company_id)
            ->whereIn('role', ['kierownik', 'użytkownik', 'menedżer'])
            ->where('supervisor_id', '=', Auth::user()->supervisor_id)
            ->paginate(10);
    }

    /**
     * Zwraca użytkowników dla użytkownika.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByUser(): \Illuminate\Pagination\LengthAwarePaginator
    {
        return User::where('company_id', Auth::user()->company_id)
            ->where('id', Auth::id())
            ->paginate(10);
    }
    /**
     * Zwraca użytkowników dla admina.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return \Illuminate\Support\Collection
     */
    public function getByAdmin(?\Illuminate\Http\Request $request = null): \Illuminate\Support\Collection
    {
        $query = User::where('company_id', Auth::user()->company_id)
            ->whereNotNull('role');

        // Filtrowanie po nazwie, jeśli request istnieje i zawiera 'search'
        if ($request && $request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->get();
    }
    /**
     * Zwraca użytkowników do wniosku.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return \Illuminate\Support\Collection
     */
    public function getManagers(?\Illuminate\Http\Request $request = null): \Illuminate\Support\Collection
    {
        // 1. Pobieramy ID aktualnie zalogowanego użytkownika i jego przełożonego
        $currentUser = Auth::user();
        $supervisorId = $currentUser->supervisor_id ?? null; // Pobierz supervisor_id

        $query = User::where('company_id', $currentUser->company_id)
            ->whereIn('role', ['admin', 'menedżer', 'właściciel']);

        // 2. Modyfikujemy zapytanie, aby ustawić przełożonego na pierwszym miejscu
        if ($supervisorId) {
            // Używamy orderByRaw, aby umieścić użytkownika z supervisorId na samej górze.
            // Jeśli id = supervisorId, przypisujemy wartość 0 (najwyższy priorytet).
            // W przeciwnym razie przypisujemy 1. Następnie sortujemy po imieniu/nazwisku.
            $query->orderByRaw('id = ? DESC', [$supervisorId]);
        }

        // Dodajemy domyślne sortowanie, np. alfabetyczne, dla pozostałych menedżerów
        $query->orderBy('name', 'asc'); // Zakładając, że masz kolumnę 'name' lub 'first_name'

        return $query->get();
    }
    /**
     * Zwraca użytkowników dla admina.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return \Illuminate\Support\Collection
     */
    public function getByAdminWorkBlock(?\Illuminate\Http\Request $request = null): \Illuminate\Support\Collection
    {
        $query = User::where('company_id', Auth::user()->company_id)
            ->where('working_hours_regular', 'zmienny planing')
            ->whereNotNull('role');

        // Filtrowanie po nazwie, jeśli request istnieje i zawiera 'search'
        if ($request && $request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->get();
    }
    /**
     * Zwraca użytkowników dla admina dla danej firmy.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByAdminByCompany($company_id = null): \Illuminate\Support\Collection
    {
        if (is_null($company_id)) {
            $company_id = Auth::user()->company_id;
        }

        return User::where('company_id', $company_id)
            ->whereNotNull('role')
            ->get();
    }
    /**
     * Zwraca użytkowników dla admina oprócz zalogowanego.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByAdminWithoutLogged(): \Illuminate\Support\Collection
    {
        return User::where('company_id', Auth::user()->company_id)
            ->where('role', '!=', null)
            ->where('id', '!=', Auth::id())
            ->get();
    }
    /**
     * Zwraca użytkowników dla menadżera.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return \Illuminate\Support\Collection
     */
    public function getByManager(?\Illuminate\Http\Request $request = null): \Illuminate\Support\Collection
    {
        $query = User::where('company_id', Auth::user()->company_id)
            ->whereIn('role', ['kierownik', 'użytkownik', 'menedżer'])
            ->where('supervisor_id', Auth::user()->supervisor_id);

        // Opcjonalne filtrowanie po nazwie użytkownika
        if ($request && $request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->get();
    }
    /**
     * Zwraca użytkowników z firmy.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllFromCompany(): \Illuminate\Support\Collection
    {
        return User::where('company_id', Auth::user()->company_id)
            ->get();
    }
    /**
     * Zwraca użytkowników dla użytkownika.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return \Illuminate\Support\Collection
     */
    public function getByUser(?\Illuminate\Http\Request $request = null): \Illuminate\Support\Collection
    {
        $query = User::where('company_id', Auth::user()->company_id)
            ->where('id', Auth::id());

        // Opcjonalne filtrowanie po nazwie (dla spójności)
        if ($request && $request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->get();
    }
    /**
     * Zwraca użytkowników dla admina.
     *
     * @param array|null $ids
     * @return \Illuminate\Support\Collection
     */
    public function getByRequestIds(?array $ids = []): \Illuminate\Support\Collection
    {
        return User::where('company_id', Auth::user()->company_id)->whereIn('id', $ids)->get();
    }

    public function countByCompanyId($companyId)
    {
        return User::where('company_id', $companyId)->count();
    }
    public function hasPlannedToday(int $userId, string $date): bool
    {
        // Pobranie użytkownika
        $user = User::find($userId);
        if (!$user) {
            return false;
        }
        if ($user->working_hours_regular != 'stały planing') {
            return false;
        }

        // Konwersja daty do formatu Carbon
        $carbonDate = Carbon::createFromFormat('d.m.y', $date);
        $dayName = strtolower($carbonDate->translatedFormat('l')); // np. monday, tuesday, etc.

        // Mapowanie dni tygodnia PL → EN (bo Carbon używa angielskich nazw)
        $daysMap = [
            'poniedziałek' => 'monday',
            'wtorek' => 'tuesday',
            'środa' => 'wednesday',
            'czwartek' => 'thursday',
            'piątek' => 'friday',
            'sobota' => 'saturday',
            'niedziela' => 'sunday',
        ];

        $startDay = $daysMap[strtolower($user->working_hours_start_day)] ?? null;
        $stopDay  = $daysMap[strtolower($user->working_hours_stop_day)] ?? null;

        if (!$startDay || !$stopDay) {
            return false;
        }

        // Sprawdzenie, czy dany dzień tygodnia mieści się w zakresie pracy użytkownika
        $weekDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $startIndex = array_search($startDay, $weekDays);
        $stopIndex  = array_search($stopDay, $weekDays);
        $currentIndex = array_search($dayName, $weekDays);

        // Zakładamy, że zakres nie zawija się przez weekend
        $isWorkingDay = $currentIndex >= $startIndex && $currentIndex <= $stopIndex;

        // Dodatkowo można sprawdzić, czy godziny są ustawione
        $hasWorkingHours = !empty($user->working_hours_from) && !empty($user->working_hours_to);

        return $isWorkingDay && $hasWorkingHours;
    }
    public function hasPlannedTodayWork(int $userId, string $date): bool
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }

        // Sprawdzamy tylko dla zmiennego planingu
        if ($user->working_hours_regular != 'zmienny planing') {
            return false;
        }

        // Ustal początek i koniec dnia
        $startOfDay = Carbon::createFromFormat('d.m.y', $date)->startOfDay();
        $endOfDay = Carbon::createFromFormat('d.m.y', $date)->endOfDay();

        // Szukamy bloku typu "work" w tym zakresie
        $exists = WorkBlock::where('user_id', $userId)
            ->whereIn('type', ['work', 'night'])
            ->where(function ($query) use ($startOfDay, $endOfDay) {
                $query->whereBetween('starts_at', [$startOfDay, $endOfDay])
                    ->orWhereBetween('ends_at', [$startOfDay, $endOfDay]);
            })
            ->exists();

        return $exists;
    }
    public function getPlannedTodayWork(int $userId, string $date)
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }

        // Sprawdzamy tylko dla zmiennego planingu
        if ($user->working_hours_regular != 'zmienny planing') {
            return false;
        }

        // Ustal początek i koniec dnia
        $startOfDay = Carbon::createFromFormat('d.m.y', $date)->startOfDay();
        $endOfDay = Carbon::createFromFormat('d.m.y', $date)->endOfDay();

        // 1. Priorytet: Szukaj bloku, który ZACZYNA SIĘ w danym zakresie
        $work = WorkBlock::where('user_id', $userId)
            ->whereIn('type', ['work', 'night'])
            ->whereBetween('starts_at', [$startOfDay, $endOfDay])
            ->first();

        // 2. Jeśli nie znaleziono, szukaj bloku, który KOŃCZY SIĘ w danym zakresie
        if (!$work) {
            $work = WorkBlock::where('user_id', $userId)
                ->whereIn('type', ['work', 'night'])
                ->whereBetween('ends_at', [$startOfDay, $endOfDay])
                // Dodatkowe wykluczenie, by nie brać rekordu, który już jest w 1. punkcie,
                // choć zazwyczaj pokrycie jest różne w obu whereBetween, lepiej się zabezpieczyć.
                ->whereNotBetween('starts_at', [$startOfDay, $endOfDay])
                ->first();
        }

        return $work;
    }
}
