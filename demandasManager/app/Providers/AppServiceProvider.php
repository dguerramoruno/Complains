<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use App\Models\Denuncia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

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
       Artisan::call('sync:data-from-api');
    }
}
