<?php namespace DeveloperTz\SimpleCaptcha\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleCaptcha extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simple-captcha';
    }
}
