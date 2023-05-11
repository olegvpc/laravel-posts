<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        View::share('date', date('Y')); // добавляет (расшаривает) переменную DATE на все страницы
        // COMPOSER Добавляет переменную только для конкретных роутов  ('user*')
        View::composer('/user*', function($view){
            dd($view);
            $view->with('balance', '12345678');
        });
				Paginator::useBootstrapFive();
    }
}
