<?php namespace DeveloperTz\SimpleCaptcha;

use Illuminate\Support\ServiceProvider;

class SimpleCaptchaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //$this->package('developer-tz/simple-captcha');
        $this->publishes([
			__DIR__.'/../../config/captcha.php' => config_path('captcha.php'),
		]);
        require __DIR__ . '/../../routes.php';
        $this->app->validator->resolver(function ($translator, $data, $rules, $messages) 
        {
            $messages['captcha'] = trans('validation.captcha');
            return new CaptchaValidator($translator, $data, $rules, $messages);
        });
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$this->app['simple-captcha'] = $this->app->share(function ($app) {
            #return SimpleCaptcha::instance();
            return new SimpleCaptcha(
                $app['Illuminate\Session\Store']
            );
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['simple-captcha'];
	}

}
