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
    public function getByCompanyId($companyId)
    {
        return User::where('company_id', $companyId)->get();
    }

    public function countByCompanyId($companyId)
    {
        return User::where('company_id', $companyId)->count();
    }
}
