<?php

namespace Jason6809\LaravelOpenssl;

use Illuminate\Support\ServiceProvider;
use Jason6809\LaravelOpenssl\Console\GenerateSSL;

class LaravelOpensslServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Registering package commands.
            $this->commands([
                GenerateSSL::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
