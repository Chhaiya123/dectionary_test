<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        // $this->registerPolicies();

        // add custom guard provider
        // Auth::provider('admin_provider_driver', function ($app, array $config) {
        //     return new AdminUserProvider(new SimpleHasher(), $config['model']);
        // });
    }
}
