<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use PaginateRoute;

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
        //
        Paginator::useBootstrap();
        // PaginateRoute::registerMacros();
        // parent::boot();
        $xml = simplexml_load_file("http://ip-api.com/xml/".getRealIpAddr());
        $country = $xml->country;
        if ($country == "China" || $country == "Hong Kong" || $country == "Taiwan"){
           abort("500");
        }
    }
}
