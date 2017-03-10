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
		View::composer('*', function($view){
			$view->with('viewName', $view->getName());
		});
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
