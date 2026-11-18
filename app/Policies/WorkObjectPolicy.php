<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkObject;

class WorkObjectPolicy
{
    public function view(User $user, WorkObject $object): bool
    {
        return $user->company_id !== null && (int) $user->company_id === (int) $object->company_id;
    }

    public function update(User $user, WorkObject $object): bool
    {
        return $this->view($user, $object);
    }

    public function delete(User $user, WorkObject $object): bool
    {
        return $this->view($user, $object);
    }
}
