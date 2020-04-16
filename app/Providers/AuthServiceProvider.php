<?php

namespace KANTIBMAS\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'KANTIBMAS\Model' => 'KANTIBMAS\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Access

        Gate::define('isUnit', function($user) {
            return $user->role == 'unit';
        }); 

        Gate::define('isSubdit', function($user) {
            return $user->role == 'unit';
        });
        
        Gate::define('isBibnopsal', function($user) {
            return $user->role == 'unit';
        });
    }
}
