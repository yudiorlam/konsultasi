<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('super_admin', function (User $user) {
            return $user->role == 1;
        });

        Gate::define('admin', function (User $user) {
            return $user->role == 2 || $user->role == 1;
        });
    }
}
