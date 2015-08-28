<?php
namespace Dannehl\UserSettings;

use Illuminate\Support\ServiceProvider;

/**
 * Class UserSettingsServiceProvider
 *
 * @package Dannehl\UserSettings
 */
class UserSettingsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('usersettings', function ($app) {
            return new \Dannehl\UserSettings\lib\UserSettings;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['usersettings'];
    }
}
