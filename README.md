[//]: # (TODO: UPDATE README)

# This is my package filament-sentry-feedback

[![Latest Version on Packagist](https://img.shields.io/packagist/v/martinpetricko/filament-sentry-feedback.svg?style=flat-square)](https://packagist.org/packages/martinpetricko/filament-sentry-feedback)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/martinpetricko/filament-sentry-feedback/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/martinpetricko/filament-sentry-feedback/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/martinpetricko/filament-sentry-feedback/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/martinpetricko/filament-sentry-feedback/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/martinpetricko/filament-sentry-feedback.svg?style=flat-square)](https://packagist.org/packages/martinpetricko/filament-sentry-feedback)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require martinpetricko/filament-sentry-feedback
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-sentry-feedback-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentSentryFeedback = new MartinPetricko\FilamentSentryFeedback();
echo $filamentSentryFeedback->echoPhrase('Hello, MartinPetricko!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martin Petricko](https://github.com/MartinPetricko)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
