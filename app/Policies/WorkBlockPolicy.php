<?php
namespace App\Policies;
use App\Models\User;
use App\Models\WorkBlock;
use App\Policies\Concerns\AuthorizesTenant;
class WorkBlockPolicy {
    use AuthorizesTenant;
    public function view(User $user, WorkBlock $block): bool { return $this->sameCompany($user, $block) && ((int) $block->user_id === (int) $user->id || $this->managesCompany($user)); }
    public function update(User $user, WorkBlock $block): bool { return $this->sameCompany($user, $block) && $this->managesCompany($user); }
    public function delete(User $user, WorkBlock $block): bool { return $this->update($user, $block); }
}
