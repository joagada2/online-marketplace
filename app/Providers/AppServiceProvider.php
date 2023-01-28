<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;


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
        Schema::defaultStringLength(191);

        Fortify::loginView(function(){
            return view('auth.login');
        });

         Fortify::registerView(function(){
            return view('auth.register');
        });
        
        Fortify::requestPasswordResetLinkView(function ($request) {
            return view('auth.forgot-password',['request=>$request']);
        });

        Fortify::resetPasswordView(function () {
            return view('auth.reset-password');
        });
        Fortify::VerifyEmailView(function ($request) {
            return view('auth.verify-email',['request'=>$request]);
        });   
        
        View::composer(['*'],function($view){
            $menus = \App\Models\Category::with('subcategories')->get();
            $view->with('menus',$menus);
        });
        
    }
}