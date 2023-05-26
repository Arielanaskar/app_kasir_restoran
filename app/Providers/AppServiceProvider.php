<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Gate::define('manager', function(User $user) {
            return $user->level_id === 1;
        });

        Gate::define('cashier', function(User $user) {
            return $user->level_id === 2;
        });

        Gate::define('admin', function(User $user) {
            return $user->level_id === 3;
        });

        Paginator::useBootstrap();
    }
}
