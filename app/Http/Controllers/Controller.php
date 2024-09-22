<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Zwraca Id firmy zalogowanego użytkownika.
     */
    public function get_company_id()
    {
        return User::find(auth()->id())->company_id;
    }

    /**
     * Zwraca obiekt firmy zalogowanego użytkownika.
     */
    public function get_company()
    {
        return Company::where('id', $this->get_company_id())->first();
    }
}
