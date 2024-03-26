<?php

namespace App\Providers;

use App\interfaces\ProductInterface;
use App\Repositories\ProductRepository;
use http\Cookie;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductInterface::class,ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*if(!\request()->hasCookie('customer_id')) {
            \Cookie::queue(\Cookie::make('customer_id', uniqid(), 1));
        }*/
        Paginator::useBootstrapFive();

    }
}
