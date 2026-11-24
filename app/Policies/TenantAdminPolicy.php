<?php
namespace App\Policies;
use App\Models\User;
use App\Policies\Concerns\AuthorizesTenant;
use Illuminate\Database\Eloquent\Model;
class TenantAdminPolicy {
    use AuthorizesTenant;
    public function view(User $user, Model $model): bool { return $this->sameCompany($user, $model) && $this->managesCompany($user); }
    public function update(User $user, Model $model): bool { return $this->view($user, $model); }
    public function delete(User $user, Model $model): bool { return $this->view($user, $model); }
}
