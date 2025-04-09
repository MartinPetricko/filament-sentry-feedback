<?php

declare(strict_types=1);

namespace MartinPetricko\FilamentSentryFeedback\Enums;

enum ColorScheme: string
{
    /**
     * Read color scheme from filament.
     */
    case Auto = 'auto';

    /**
     * Use system color scheme.
     */
    case System = 'system';

    /**
     * Use dark color scheme.
     */
    case Dark = 'dark';

    /**
     * Use light color scheme.
     */
    case Light = 'light';
}
