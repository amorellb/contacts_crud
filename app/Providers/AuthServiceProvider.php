<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\User;
use App\Policies\ContactPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Contact::class => ContactPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewAll', function (User $user) {
            return $user->role === 'super' || $user->role === 'admin';
        });

        Gate::define('viewAllAndDeleted', function (User $user) {
            return $user->role === 'super';
        });
    }
}
