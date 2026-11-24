<?php
namespace App\Policies;
use App\Models\Leave;
use App\Models\User;
use App\Policies\Concerns\AuthorizesTenant;
class LeavePolicy {
    use AuthorizesTenant;
    public function view(User $user, Leave $leave): bool { return $this->sameCompany($user, $leave) && ((int) $leave->user_id === (int) $user->id || $this->managesCompany($user)); }
    public function update(User $user, Leave $leave): bool { return $this->view($user, $leave); }
    public function approve(User $user, Leave $leave): bool { return $this->sameCompany($user, $leave) && $this->managesCompany($user); }
    public function delete(User $user, Leave $leave): bool { return $this->update($user, $leave); }
}
