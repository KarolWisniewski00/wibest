<?php
namespace App\Policies;
use App\Models\User;
use App\Policies\Concerns\AuthorizesTenant;
class UserPolicy {
    use AuthorizesTenant;
    public function view(User $actor, User $subject): bool { return (int) $actor->id === (int) $subject->id || ($actor->company_id !== null && (int) $actor->company_id === (int) $subject->company_id && $this->managesCompany($actor)); }
    public function update(User $actor, User $subject): bool { return $this->view($actor, $subject); }
    public function administer(User $actor, User $subject): bool { return $actor->company_id !== null && (int) $actor->company_id === (int) $subject->company_id && $this->managesCompany($actor); }
    public function delete(User $actor, User $subject): bool { return (int) $actor->id !== (int) $subject->id && $this->administer($actor, $subject); }
}
