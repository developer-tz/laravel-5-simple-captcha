# Simple Captcha package for Laravel 5

A simple [Laravel 5](http://laravel.com/) package for including the [Simple Captcha for Laravel 5](https://github.com/developer-tz/laravel-5-simple-captcha).

## Installation

The Simple Captcha Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`developer-tz/simple-captcha` package and setting the `minimum-stability` to `dev` in your
project's `composer.json`.

```json
{
    "require": {
        "laravel/framework": "5.*",
        "developer-tz/simple-captcha": "dev-master"
    },
    "minimum-stability": "dev"
}
```


Update your packages with ```composer update``` or install with ```composer install```.

In Windows, you'll need to include the GD2 DLL `php_gd2.dll` as an extension in php.ini.


## Usage

To use the Simple Captcha Service Provider, you must register the provider when bootstrapping your Laravel application. 
There are essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the Simple Captcha Service Provider.

```php
    'providers' => array(
        // ...
        'DeveloperTz\SimpleCaptcha\SimpleCaptchaServiceProvider',
    )
```

Find the `aliases` key in `config/app.php`.

```php
    'aliases' => array(
        // ...
        'SimpleCaptcha'      => 'DeveloperTz\SimpleCaptcha\Facades\SimpleCaptcha',
    )
```

## Configuration

To use your own settings, publish config.

```$ php artisan vendor:publish```

## Example Usage

```php

    // [your site path]/app/routes.php

    Route::any('/simple-captcha-test', function()
    {

        if (Request::getMethod() == 'POST')
        {
            $rules =  array('captcha' => array('required', 'captcha'));
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }

        $content = Form::open(array(URL::to(Request::segment(1))));
        $content .= '<p>' . HTML::image(SimpleCaptcha::img(), 'Captcha image') . '</p>';
        $content .= '<p>' . Form::text('captcha') . '</p>';
        $content .= '<p>' . Form::submit('Check') . '</p>';
        $content .= '<p>' . Form::close() . '</p>';
        return $content;

    });
```

^_^

## Links

* [L5 Simple Captcha on Github](https://github.com/developer-tz/laravel-5-simple-captcha)
* [L4 Captcha on Packagist](https://packagist.org/packages/developer-tz/simple-captcha)
* [License](http://www.opensource.org/licenses/mit-license.php)
* [Laravel website](http://laravel.com)

### Captcha package for earlier versions,

* [L4 Captcha on Github](https://github.com/mewebstudio/captcha)
* [L3 Captcha on Github](https://github.com/mewebstudio/mecaptcha)
