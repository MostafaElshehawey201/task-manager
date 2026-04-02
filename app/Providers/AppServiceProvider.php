<?php

namespace App\Providers;

use App\Interfaces\Auth\LoginServiceInterface;
use App\Interfaces\Auth\RegisterRepositoryInterface;
use App\Interfaces\Auth\RegisterServiceInterface;
use App\Interfaces\Auth\RequestOtpServiceInterface;
use App\Interfaces\Auth\Strategies\ManagerLoginStrategyInterface;
use App\Interfaces\Auth\Strategies\ManagerRequestOtpStrategyInterface;
use App\Interfaces\Auth\Strategies\Process\ProcessStrategiesInterface;
use App\Repositories\Auth\ProcessRepository;
use App\Services\Auth\ProcessService;
use App\Strategies\Auth\Manager\ManagerLoginStrategy;
use App\Strategies\Auth\Manager\ManagerRequestOtpStrategy;
use App\Strategies\Auth\Process\EmailStrategy;
use App\Strategies\Auth\Process\PhoneStrategy;
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
        $this->app->bind(
            LoginServiceInterface::class,
            ProcessService::class,
        );
        $this->app->bind(
            ManagerLoginStrategyInterface::class,
            ManagerLoginStrategy::class,
        );
        $this->app->bind(
            ProcessStrategiesInterface::class,
            PhoneStrategy::class,
        );
        $this->app->bind(
            ProcessStrategiesInterface::class,
            EmailStrategy::class,
        );
        $this->app->bind(
            RequestOtpServiceInterface::class,
            ProcessService::class,
        );
        $this->app->bind(
            ManagerRequestOtpStrategyInterface::class,
            ManagerRequestOtpStrategy::class,
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
