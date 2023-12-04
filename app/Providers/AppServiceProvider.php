<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use View;
use Cart;

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
        View::composer('*', function ($view){
            $view->with('categories', Category::all());
        });

        View::composer('*', function ($view){
            $view->with('cart_products', Cart::getContent());
        });

        View::composer('*', function ($view){
            $view->with('orders', Order::all());
        });


    }
}
