<?php

declare(strict_types=1);

namespace MartinPetricko\FilamentSentryFeedback;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentSentryFeedbackPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-sentry-feedback';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        /** @var static $instance */
        $instance = app(static::class);
        return $instance;
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(static::make()->getId());
        return $plugin;
    }
}
