<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
        // Set locale from session on every request
        if (session()->has('locale')) {
            $locale = session('locale');
            if (in_array($locale, ['en', 'ar'])) {
                App::setLocale($locale);
            }
        }

        // Share locale with all views
        View::composer('*', function ($view) {
            $view->with('currentLocale', App::getLocale());
        });
    }
}
