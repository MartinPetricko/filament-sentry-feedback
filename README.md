# Filament Sentry Feedback

[![Latest Version on Packagist](https://img.shields.io/packagist/v/martinpetricko/filament-sentry-feedback.svg?style=flat-square)](https://packagist.org/packages/martinpetricko/filament-sentry-feedback)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/martinpetricko/filament-sentry-feedback/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/martinpetricko/filament-sentry-feedback/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/martinpetricko/filament-sentry-feedback/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/martinpetricko/filament-sentry-feedback/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/martinpetricko/filament-sentry-feedback.svg?style=flat-square)](https://packagist.org/packages/martinpetricko/filament-sentry-feedback)

Filament Sentry Feedback integrates the [Sentry User Feedback](https://sentry.io/for/user-feedback/) widget with [FilamentPHP](https://filamentphp.com/).

## Installation

You can install the package via composer:

```bash
composer require martinpetricko/filament-sentry-feedback
```

If you'd like to customize the translations used by the package, you can publish the language files:

```bash
php artisan vendor:publish --tag="filament-sentry-feedback-translations"
```

Optionally, publish the config file:

```bash
php artisan vendor:publish --tag="filament-sentry-feedback-config"
```

These are the contents of the published config file:

```php
return [
    /**
    * https://docs.sentry.io/concepts/key-terms/dsn-explainer/#where-to-find-your-data-source-name-dsn
    */
    'dsn' => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),

    /**
    * https://docs.sentry.io/platforms/javascript/user-feedback/configuration/
    */
    'widget' => [
        'element_id' => 'sentry-feedback',
        'color_scheme' => ColorScheme::Auto,
        'show_branding' => false,
        'show_name' => true,
        'is_name_required' => false,
        'show_email' => true,
        'is_email_required' => true,
        'enable_screenshot' => true,
    ],
];
```

Set your [Sentry DSN](https://docs.sentry.io/concepts/key-terms/dsn-explainer/#where-to-find-your-data-source-name-dsn) in the `.env` file:

```dotenv
SENTRY_LARAVEL_DSN=https://examplePublicKey@o0.ingest.sentry.io/0
```

Register the plugin in your Filament panel:

```php
->plugins([
    \MartinPetricko\FilamentSentryFeedback\FilamentSentryFeedbackPlugin::make(),
])
```

You can preload authenticated user data for Sentry Feedback widget by defining SentryUser entity:

```php
->plugins([
    \MartinPetricko\FilamentSentryFeedback\FilamentSentryFeedbackPlugin::make()
        ->sentryUser(function (): ?SentryUser {
            return new SentryUser(auth()->user()->name, auth()->user()->email);
        }),
])
```

You can override the global config per panel:

```php
->plugins([
    \MartinPetricko\FilamentSentryFeedback\FilamentSentryFeedbackPlugin::make()
        ->dsn('https://examplePublicKey@o0.ingest.sentry.io/0')
        ->elementId('sentry-feedback')
        ->colorScheme(ColorScheme::Auto)
        ->showBranding(true)
        ->showName(true)
        ->isNameRequired(true)
        ->showEmail(true)
        ->isEmailRequired(true)
        ->enableScreenshot(true),
])
```

### CSS Customization

To customize the appearance of the feedback widget:
1. [Create a custom theme](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme) for your panel.
2. Override the Sentry Feedback widget's [CSS variables](https://docs.sentry.io/platforms/javascript/user-feedback/configuration/#css-customization)

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martin Petricko](https://github.com/MartinPetricko)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
