<?php

namespace App\Providers;

use App\Models\Tenant;
use App\Services\OwnerService;
use App\Services\TenantService;
use App\Services\PropertyService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Owner\OwnerInterface;
use App\Repositories\Owner\OwnerRepository;
use App\Repositories\Tenant\TenantInterface;
use App\Repositories\Tenant\TenantRepository;
use App\Repositories\Property\PropertyInterface;
use App\Repositories\Property\PropertyRepository;

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

        $this->app->bind(OwnerInterface::class, OwnerRepository::class);
        $this->app->bind(OwnerService::class, function ($app) {
            return new OwnerService($app->make(OwnerInterface::class));
        });

        $this->app->bind(TenantInterface::class, TenantRepository::class);
        $this->app->bind(TenantService::class, function ($app) {
            return new TenantService($app->make(TenantInterface::class));
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
