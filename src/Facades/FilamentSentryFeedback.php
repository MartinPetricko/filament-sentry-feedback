<?php

declare(strict_types=1);

namespace MartinPetricko\FilamentSentryFeedback\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MartinPetricko\FilamentSentryFeedback\FilamentSentryFeedback
 */
class FilamentSentryFeedback extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \MartinPetricko\FilamentSentryFeedback\FilamentSentryFeedback::class;
    }
}
