<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User\Authentication\Authentication;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Register Authentication class
        $this->app->singleton(Authentication::class, function ($app) {
            return new Authentication();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
