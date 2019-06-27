<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton;

use Illuminate\Support\ServiceProvider;

class SocialiteSkeletonServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerMigrations();
        $this->publishAndLoadConfigs();
    }

    protected function registerMigrations()
    {
        if (!app()->runningInConsole()) {
            return;
        }

        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }

    protected function publishAndLoadConfigs()
    {
        $path = __DIR__ . '/config.php';
        $key = 'laravel-socialite-skeleton';

        $this->mergeConfigFrom($path, $key);
        if (!app()->runningInConsole()) {
            return;
        }

        $this->publishes([
            $path => config_path($key . '.php'),
        ], $key);
    }
}
