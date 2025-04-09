<?php

declare(strict_types=1);

namespace MartinPetricko\FilamentSentryFeedback;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSentryFeedbackServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-sentry-feedback';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        //
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            AlpineComponent::make('filament-sentry-feedback', __DIR__ . '/../resources/dist/components/filament-sentry-feedback.js'),
            Css::make('filament-sentry-feedback-styles', __DIR__ . '/../resources/dist/filament-sentry-feedback.css'),
        ], 'martinpetricko/filament-sentry-feedback');
    }
}
