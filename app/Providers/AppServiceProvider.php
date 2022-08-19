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
        $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
        $country = $xml->geoplugin_countryName;
        if ($country == "China" || $country == "Hongkong" || $country == "Taiwan"){
           abort("500");
        }
    }
}
