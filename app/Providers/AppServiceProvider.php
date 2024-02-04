<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OpenWeatherMapService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // public function register(): void
    // {
    //     //
    // }
    public function register()
    {
        $this->app->singleton(OpenWeatherMapService::class, function ($app) {
            return new OpenWeatherMapService(config('services.openweathermap.api_key'));
        });
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
