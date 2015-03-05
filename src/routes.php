<?php

Route::get('/captcha', function () {
    return SimpleCaptcha::create(Input::has('id') ? Input::get('id') : null);
});
