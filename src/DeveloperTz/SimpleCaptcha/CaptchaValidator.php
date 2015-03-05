<?php namespace DeveloperTz\SimpleCaptcha;

use Illuminate\Validation\Validator;

class CaptchaValidator extends Validator
{
    public function validateCaptcha($attribute, $value, $parameters)
    {
        return \SimpleCaptcha::check($value);
    }
}
