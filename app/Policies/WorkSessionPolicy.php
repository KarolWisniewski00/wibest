<?php
namespace App\Policies;
use App\Models\User;
use App\Models\WorkSession;
use App\Policies\Concerns\AuthorizesTenant;
class WorkSessionPolicy {
    use AuthorizesTenant;
    public function view(User $user, WorkSession $session): bool { return $this->sameCompany($user, $session) && ((int) $session->user_id === (int) $user->id || $this->managesCompany($user)); }
    public function update(User $user, WorkSession $session): bool { return $this->view($user, $session); }
    public function delete(User $user, WorkSession $session): bool { return $this->sameCompany($user, $session) && $this->managesCompany($user); }
}
