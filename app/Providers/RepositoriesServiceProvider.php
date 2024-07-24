<?php

namespace App\Providers;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Repositories\ParametersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ParametersRepositoryContract::class, ParametersRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
