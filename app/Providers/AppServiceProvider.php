<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registratie van service bindings
    }

   public function boot()
{
    // Voor productie-omgeving dwingen om HTTPS te gebruiken
    if ($this->app->environment('production')) {
        URL::forceScheme('https');
        \Log::info('URL scheme forced to HTTPS.');
    }
}

}

