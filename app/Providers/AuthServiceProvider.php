<?php

namespace App\Providers;

use App\Models\{Client, Crm, Invoice, Leave, User, WorkBlock, WorkObject, WorkSession};
use App\Policies\{LeavePolicy, TenantAdminPolicy, UserPolicy, WorkBlockPolicy, WorkObjectPolicy, WorkSessionPolicy};
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        WorkSession::class => WorkSessionPolicy::class,
        Leave::class => LeavePolicy::class,
        WorkBlock::class => WorkBlockPolicy::class,
        User::class => UserPolicy::class,
        Client::class => TenantAdminPolicy::class,
        Invoice::class => TenantAdminPolicy::class,
        Crm::class => TenantAdminPolicy::class,
        WorkObject::class => WorkObjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('manage-payroll', fn (User $user) => $user->company_id !== null
            && in_array($user->role, ['admin', 'właściciel'], true));
        Gate::define('manage-company', fn (User $user) => $user->company_id !== null
            && in_array($user->role, ['admin', 'menedżer', 'właściciel'], true));
    }
}
