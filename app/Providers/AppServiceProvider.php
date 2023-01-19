<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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

    /**config/app.php
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $url->forceSchema('https');
        
        Schema::defaultStringLength(125);
    }
}
