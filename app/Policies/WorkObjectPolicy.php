<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkObject;

class WorkObjectPolicy
{
    use \App\Policies\Concerns\AuthorizesTenant;

    public function view(User $user, WorkObject $object): bool
    {
        return $this->sameCompany($user, $object);
    }

    public function update(User $user, WorkObject $object): bool
    {
        return $this->view($user, $object) && $this->managesCompany($user);
    }

    public function delete(User $user, WorkObject $object): bool
    {
        return $this->view($user, $object) && $this->managesCompany($user);
    }
}
