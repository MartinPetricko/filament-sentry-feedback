<?php

declare(strict_types=1);

namespace MartinPetricko\FilamentSentryFeedback;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\View\PanelsRenderHook;
use Illuminate\View\View;
use MartinPetricko\FilamentSentryFeedback\Entities\SentryUser;
use MartinPetricko\FilamentSentryFeedback\Enums\ColorScheme;

class FilamentSentryFeedbackPlugin implements Plugin
{
    use EvaluatesClosures;

    protected string|Closure|null $dsn = null;

    protected string|Closure|null $elementId = null;

    protected ColorScheme|Closure|null $colorScheme = null;

    protected bool|Closure|null $showBranding = null;

    protected bool|Closure|null $showName = null;

    protected bool|Closure|null $isNameRequired = null;

    protected bool|Closure|null $showEmail = null;

    protected bool|Closure|null $isEmailRequired = null;

    protected bool|Closure|null $enableScreenshot = null;

    protected Closure|null $sentryUser = null;

    public function getId(): string
    {
        return 'filament-sentry-feedback';
    }

    public function register(Panel $panel): void
    {
        $panel->renderHook(PanelsRenderHook::BODY_END, static fn (): View => view('filament-sentry-feedback::components.sentry-feedback'));
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public function dsn(string|Closure $dsn): static
    {
        $this->dsn = $dsn;
        return $this;
    }

    public function getDsn(): string
    {
        /** @var string|null $dsn */
        $dsn = $this->evaluate($this->dsn);
        if ($dsn === null) {
            /** @var string $dsn */
            $dsn = config('filament-sentry-feedback.dsn');
        }
        return $dsn;
    }

    public function elementId(string|Closure $elementId): static
    {
        $this->elementId = $elementId;
        return $this;
    }

    public function getElementId(): string
    {
        /** @var string|null $elementId */
        $elementId = $this->evaluate($this->elementId);
        if ($elementId === null) {
            /** @var string $elementId */
            $elementId = config('filament-sentry-feedback.widget.element_id');
        }
        return $elementId;
    }

    public function colorScheme(ColorScheme|Closure $colorScheme): static
    {
        $this->colorScheme = $colorScheme;
        return $this;
    }

    public function getColorScheme(): string
    {
        /** @var ColorScheme|null $colorScheme */
        $colorScheme = $this->evaluate($this->colorScheme);
        if ($colorScheme === null) {
            /** @var ColorScheme $colorScheme */
            $colorScheme = config('filament-sentry-feedback.widget.color_scheme');
        }

        return $colorScheme->value;
    }

    public function showBranding(bool|Closure $showBranding): static
    {
        $this->showBranding = $showBranding;
        return $this;
    }

    public function getShowBranding(): bool
    {
        /** @var bool|null $showBranding */
        $showBranding = $this->evaluate($this->showBranding);
        if ($showBranding === null) {
            /** @var bool $showBranding */
            $showBranding = config('filament-sentry-feedback.widget.show_branding');
        }
        return $showBranding;
    }

    public function showName(bool|Closure $showName): static
    {
        $this->showName = $showName;
        return $this;
    }

    public function getShowName(): bool
    {
        /** @var bool|null $showName */
        $showName = $this->evaluate($this->showName);
        if ($showName === null) {
            /** @var bool $showName */
            $showName = config('filament-sentry-feedback.widget.show_name');
        }
        return $showName;
    }

    public function isNameRequired(bool|Closure $isNameRequired): static
    {
        $this->isNameRequired = $isNameRequired;
        return $this;
    }

    public function getIsNameRequired(): bool
    {
        /** @var bool|null $isNameRequired */
        $isNameRequired = $this->evaluate($this->isNameRequired);
        if ($isNameRequired === null) {
            /** @var bool $isNameRequired */
            $isNameRequired = config('filament-sentry-feedback.widget.is_name_required');
        }
        return $isNameRequired;
    }

    public function showEmail(bool|Closure $showEmail): static
    {
        $this->showEmail = $showEmail;
        return $this;
    }

    public function getShowEmail(): bool
    {
        /** @var bool|null $showEmail */
        $showEmail = $this->evaluate($this->showEmail);
        if ($showEmail === null) {
            /** @var bool $showEmail */
            $showEmail = config('filament-sentry-feedback.widget.show_email');
        }
        return $showEmail;
    }

    public function isEmailRequired(bool|Closure $isEmailRequired): static
    {
        $this->isEmailRequired = $isEmailRequired;
        return $this;
    }

    public function getIsEmailRequired(): bool
    {
        /** @var bool|null $isEmailRequired */
        $isEmailRequired = $this->evaluate($this->isEmailRequired);
        if ($isEmailRequired === null) {
            /** @var bool $isEmailRequired */
            $isEmailRequired = config('filament-sentry-feedback.widget.is_email_required');
        }
        return $isEmailRequired;
    }

    public function enableScreenshot(bool|Closure $enableScreenshot): static
    {
        $this->enableScreenshot = $enableScreenshot;
        return $this;
    }

    public function getEnableScreenshot(): bool
    {
        /** @var bool|null $enableScreenshot */
        $enableScreenshot = $this->evaluate($this->enableScreenshot);
        if ($enableScreenshot === null) {
            /** @var bool $enableScreenshot */
            $enableScreenshot = config('filament-sentry-feedback.widget.enable_screenshot');
        }
        return $enableScreenshot;
    }

    public function sentryUser(Closure $sentryUser): static
    {
        $this->sentryUser = $sentryUser;
        return $this;
    }

    public function getSentryUser(): ?SentryUser
    {
        /** @var SentryUser|null $sentryUser */
        $sentryUser = $this->evaluate($this->sentryUser);
        return $sentryUser;
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
