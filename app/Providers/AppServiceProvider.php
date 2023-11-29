<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('unidade', function ($attribute, $value, $parameters, $validator) {
            return in_array($value, ['kcal', 'Mcal', 'J', '%', 'g', 'µg', 'UI', 'ppb']);
        });

        Validator::extend('tipo_ingrediente', function ($attribute, $value, $parameters, $validator) {
            return in_array($value, ['Macro', 'Micro']);
        });

        view()->share('theme', \Cookie::get('theme', 'light'));
        Paginator::useBootstrapFive();
    }
}
