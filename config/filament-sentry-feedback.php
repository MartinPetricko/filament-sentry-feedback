<?php

declare(strict_types=1);

use MartinPetricko\FilamentSentryFeedback\Enums\ColorScheme;

// config for MartinPetricko/FilamentSentryFeedback
return [
    'dsn' => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),

    'widget' => [
        'element_id' => 'sentry-feedback',
        'color_scheme' => ColorScheme::Auto,
        'show_branding' => true,
        'show_name' => true,
        'is_name_required' => false,
        'show_email' => true,
        'is_email_required' => true,
        'enable_screenshot' => true,

        //TODO: text_customization
    ],
];
