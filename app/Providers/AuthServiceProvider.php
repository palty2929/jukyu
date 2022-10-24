<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->roll < 10;
        });

        Gate::define('master', function ($user) {
            return  $user->roll < 20;
        });

        Gate::define('stock', function ($user) {
            return $user->roll < 30;
        });

        Gate::define('operator', function ($user) {
            return $user->roll < 40;
        });

        Gate::define('user', function ($user) {
            return $user->roll <= 99;
        });
    }
}
