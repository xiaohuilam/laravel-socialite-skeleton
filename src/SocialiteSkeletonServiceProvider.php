<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton;

use Illuminate\Support\ServiceProvider;

class SocialiteSkeletonServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerMigrations();
    }

    public function registerMigrations()
    {
        if (!app()->runningInConsole()) {
            return;
        }

        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }
}