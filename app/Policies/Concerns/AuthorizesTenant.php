<?php

namespace App\Policies\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

trait AuthorizesTenant
{
    protected function sameCompany(User $user, Model $model): bool
    {
        return $user->company_id !== null
            && $model->getAttribute('company_id') !== null
            && (int) $user->company_id === (int) $model->getAttribute('company_id');
    }

    protected function managesCompany(User $user): bool
    {
        return in_array($user->role, ['admin', 'menedżer', 'właściciel'], true);
    }
}
