<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $activeTheme = config('theme.active', 'tema_1');

        // Aktif temayı paylaş
        View::share('active_theme', $activeTheme);

        // View namespace'lerini ayarla
        View::addNamespace('theme', resource_path('views/themes/' . $activeTheme));

        // Fallback view yolunu ayarla
        View::addLocation(resource_path('views/themes/tema_1'));
    }
}
