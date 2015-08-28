<?php
namespace Dannehl\UserSettings\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class UserSettings
 *
 * @package Dannehl\UserSettings\Facade
 */
class UserSettings extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'usersettings';
    }
}