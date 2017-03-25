<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider, View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
    	define('CATEGORY_ITEMS', 0);
    	define('CATEGORY_PRODUCTS', 1);
		define('CATEGORY_BOTH', 2);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        //
    }
}
