<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->registerPolicies();
    
        Gate::define('manage-users', function ($user) {
            return $user->role === 'Admin';
        });
    
        Gate::define('manage-customers', function ($user) {
            return in_array($user->role, ['Employee', 'Admin']);
        });
    }
}