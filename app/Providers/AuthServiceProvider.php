<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->runningInConsole()) {
            Gate::before(function ($user) {

                if (in_array(Auth::user()->id, [1])) {
                    return true;
                }
            });

            foreach (Permission::all() as $p) {
                Gate::define($p->code, function($user) use ($p) {
                    return $user->checkPermission($p);
                });
            }
        }

    }
}
