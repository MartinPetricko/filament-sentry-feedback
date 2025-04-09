<?php

declare(strict_types=1);

namespace MartinPetricko\FilamentSentryFeedback\Entities;

final readonly class SentryUser
{
    public function __construct(public ?string $name, public ?string $email)
    {
        //
    }
}
