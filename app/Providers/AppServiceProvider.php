<?php

namespace App\Providers;

use App\Interfaces\Auth\RegisterInterface;
use App\Services\Auth\ProcessService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            RegisterInterface::class,
            ProcessService::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
