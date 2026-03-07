<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'settings' => [
        'tax_rate' => env('TAX_RATE', 18),
        'small_supply_rate' => env('SMALL_SUPPLY_RATE', 2),
    ],

    'fne' => [
        'url' => env('FNE_URL'),
    ],

    'recharge' => [
        'cost' => env('RECHARGE_COST'),
    ],

    'wave' => [
        'api_key' => env('WAVE_API_KEY'),
        'signing_secret' => env('WAVE_SIGNING_SECRET'),
        'base_url' => env('WAVE_BASE_URL', 'https://api.wave.com/v1'),
        'success_url' => env('WAVE_SUCCESS_URL', 'https://example.com/success'),
        'error_url' => env('WAVE_ERROR_URL', 'https://example.com/error'),
        'currency' => env('WAVE_CURRENCY', 'XOF'),
    ],

];
