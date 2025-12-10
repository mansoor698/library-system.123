<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     * Used by Laravel redirect after login.
     */
    // We are not using this anymore:
    // public const HOME = '/dashboard';

    /**
     * Define route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        parent::boot();

        // Add this ONLY if you're customizing route file loading manually
        // $this->routes(function () {
        //     Route::middleware('web')
        //         ->group(base_path('routes/web.php'));

        //     Route::middleware('api')
        //         ->prefix('api')
        //         ->group(base_path('routes/api.php'));
        // });
    }

    /**
     * Custom redirection logic after login based on role
     */
    public static function redirectBasedOnRole(): string
    {
        return auth()->user() && auth()->user()->is_admin
            ? '/admin/dashboard'
            : '/dashboard';
    }
}
