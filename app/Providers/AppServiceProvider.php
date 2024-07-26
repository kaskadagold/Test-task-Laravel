<?php

namespace App\Providers;

use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\ParametersUpdateServiceContract;
use App\Services\ImagesService;
use App\Services\ParametersService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\MessageLimiterContract;
use App\Services\FlashMessage;
use App\Services\MessageLimiter;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Config;
use App\Faker\FakerImageProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(MessageLimiterContract::class, MessageLimiter::class);
        $this->app->singleton(
            FlashMessage::class, 
            fn () => new FlashMessage($this->app->make (MessageLimiterContract::class), session())
        );
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });
        $this->app->singleton(ParametersUpdateServiceContract::class, ParametersService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
