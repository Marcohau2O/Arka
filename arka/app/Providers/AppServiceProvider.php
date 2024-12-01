<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Payment;
use App\Models\PaypalTransaction;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->share('totalUser', User::count());

        view()->share('totalVentas', Payment::count());

        view()->share('totalVentas2', PaypalTransaction::count());
    }
}
