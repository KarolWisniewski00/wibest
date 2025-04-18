<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    public function getCompanyId(): ?int
    {
        return Auth::user()?->company_id;
    }
}
