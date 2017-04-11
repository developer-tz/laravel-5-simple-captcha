<?php
use Illuminate\Support\Facades\Input;

Route::group(['middleware' => ['web']], function () {
     Route::get('/captcha', function () {
	    return SimpleCaptcha::create(Input::has('id') ? Input::get('id') : null);
	});
});