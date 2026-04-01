<?php

namespace App\Providers;

use App\Interfaces\Auth\RegisterRepositoryInterface;
use App\Interfaces\Auth\RegisterServiceInterface;
use App\Repositories\Auth\ProcessRepository;
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
            RegisterServiceInterface::class,
            ProcessService::class,
        );
        $this->app->bind(
            RegisterRepositoryInterface::class,
            ProcessRepository::class,
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
