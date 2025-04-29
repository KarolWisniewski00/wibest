<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    /**
     * Pobiera ID zalogowanego użytkownika
     *
     * @return int|null
     */
    public function getAuthUserId(): ?int
    {
        return Auth::id();
    }
    public function getByCompanyId($companyId, $page = 1)
    {
        return User::where('company_id', $companyId)
            ->where('role', '!=', null)
            ->paginate(10, ['*'], 'page', $page);
    }
    public function getByLoggedUserCompanyId($companyId, $page = 1)
    {
        return User::where('company_id', $companyId)
            ->where('id', Auth::id())
            ->paginate(10, ['*'], 'page', $page);
    }
    public function getByCompanyIdAll($companyId)
    {
        return User::where('company_id', $companyId)
            ->where('role', '!=', null)
            ->get();
    }
    public function getByLoggedUserCompanyIdAll($companyId)
    {
        return User::where('company_id', $companyId)
            ->where('id', Auth::id())
            ->get();
    }
    public function countByCompanyId($companyId)
    {
        return User::where('company_id', $companyId)->count();
    }
}
