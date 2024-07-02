<?php

namespace App\Providers;
use App\Services\PropertyService;
use App\Repositories\Property\PropertyInterface;
use App\Repositories\Property\PropertyRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyInterface::class, PropertyRepository::class);
        $this->app->bind(PropertyService::class, function ($app) {
            return new PropertyService($app->make(PropertyInterface::class));
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
