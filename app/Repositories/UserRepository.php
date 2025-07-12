<?php

namespace App\Repositories;

use App\Models\User;
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
     * @return \Illuminate\Support\Collection
     */
    public function getByAdmin(): \Illuminate\Support\Collection
    {
        return User::where('company_id', Auth::user()->company_id)
            ->where('role', '!=', null)
            ->get();
    }
    /**
     * Zwraca użytkowników dla menadżera.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByManager(): \Illuminate\Support\Collection
    {
        return User::where('company_id', Auth::user()->company_id)
            ->whereIn('role', ['kierownik', 'użytkownik', 'menedżer'])
            ->where('supervisor_id', '=', Auth::user()->supervisor_id)
            ->get();
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
     * @return \Illuminate\Support\Collection
     */
    public function getByUser(): \Illuminate\Support\Collection
    {
        return User::where('company_id', Auth::user()->company_id)
            ->where('id', Auth::id())
            ->get();
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
}
