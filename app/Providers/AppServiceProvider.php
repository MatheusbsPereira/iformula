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
        Validator::extend('tipo_ingrediente', function ($attribute, $value, $parameters, $validator) {
            return in_array($value, ['Macro-ingrediente', 'Micro-ingrediente']);
        });

        view()->share('theme', \Cookie::get('theme', 'light'));
        Paginator::useBootstrapFive();
    }
}
