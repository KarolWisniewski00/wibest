<?php

namespace App\Support;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class UserCreationAccess
{
    public static function authorize($companyId, bool $clients = false): void
    {
        $actor = Auth::user();
        abort_unless($actor, 403);
        abort_unless($clients
            ? $actor->role === 'właściciel'
            : in_array($actor->role, ['admin', 'właściciel'], true) && (int) $actor->company_id === (int) $companyId, 403);
        abort_unless($companyId && Company::whereKey($companyId)->exists(), 403);
    }
}
