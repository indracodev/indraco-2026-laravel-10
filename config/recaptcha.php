<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google reCAPTCHA v2 Configuration
    |--------------------------------------------------------------------------
    | Get your keys at: https://www.google.com/recaptcha/admin/create
    | Choose reCAPTCHA v2 → "I'm not a robot" Checkbox
    */
    'site_key'   => env('RECAPTCHA_SITE_KEY', ''),
    'secret_key' => env('RECAPTCHA_SECRET_KEY', ''),
];
