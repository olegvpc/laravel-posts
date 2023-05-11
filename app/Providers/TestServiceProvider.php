<?php

namespace App\Providers;

use App\Test\Test;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    // {
    //     $this->app->bind('test', function(){
    //         return new Test(config('example'));
    //     });
    // }
    // > app('test') //  все время разные объекты экземпляра класса
// = App\Test\Test {#3724}

// > app('test')
// = App\Test\Test {#3725}

// > app('test')
// = App\Test\Test {#3732}
    {
        $this->app->singleton('test', function(){  // $this->app-> - тоже самое что app()->
            return new Test(config('example'));
        });
    }
//     > app()->sinletone(...) // один и тот же объект экземпляра класса
// = App\Test\Test {#3727}

// > app('test')
// = App\Test\Test {#3727}

// > app('test')

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
