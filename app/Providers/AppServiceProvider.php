<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\View;
use App\Models\Category;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $category = Category::all();
            $view->with('category', $category);});

        Schema::defaultStringLength(191);
       
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('http');
        }

        
    }
}
