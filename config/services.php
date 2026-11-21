<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have a
    | conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'gemini' => [
        'api_key' => env('GEMINI_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | 9Router AI (OpenAI-compatible endpoint)
    |--------------------------------------------------------------------------
    |
    | Endpoint lokal 9Router yang menyediakan model combo "pratama_ai".
    | Digunakan oleh fitur AI Estimator, AI Portfolio Search, dan Chatbot.
    */
    'ninerouter' => [
        'provider'          => env('AI_PROVIDER', 'ninerouter'),
        'base_url'          => env('AI_BASE_URL', 'http://192.168.1.3:20128/v1'),
        'api_key'           => env('AI_API_KEY'),
        'model'             => env('AI_MODEL', 'pratama_ai'),
        'temperature'       => (float) env('AI_TEMPERATURE', 0.3),
        'app_bearer_token'  => env('APP_API_BEARER_TOKEN', 'pratama_secret_token_2026'),
    ],

    'ai' => [
        'provider'          => env('AI_PROVIDER', 'ninerouter'),
        'base_url'          => env('AI_BASE_URL', 'http://192.168.1.3:20128/v1'),
        'api_key'           => env('AI_API_KEY'),
        'model'             => env('AI_MODEL', 'pratama_ai'),
        'temperature'       => (float) env('AI_TEMPERATURE', 0.3),
        'app_bearer_token'  => env('APP_API_BEARER_TOKEN', 'pratama_secret_token_2026'),
    ],

];
