@use('Filament\Support\Facades\FilamentAsset')
@use('MartinPetricko\FilamentSentryFeedback\FilamentSentryFeedbackPlugin')

@php
    $plugin = FilamentSentryFeedbackPlugin::get();
@endphp

<div
    x-load
    x-load-src="{{ FilamentAsset::getAlpineComponentSrc('filament-sentry-feedback', 'martinpetricko/filament-sentry-feedback') }}"
    x-data="initSentryFeedback({
        dsn: @js($plugin->getDsn()),
        elementId: @js($plugin->getElementId()),
        colorScheme: @js($plugin->getColorScheme()),
        showBranding: @js($plugin->getShowBranding()),
        showName: @js($plugin->getShowName()),
        isNameRequired: @js($plugin->getIsNameRequired()),
        showEmail: @js($plugin->getShowEmail()),
        isEmailRequired: @js($plugin->getIsEmailRequired()),
        enableScreenshot: @js($plugin->getEnableScreenshot()),
        sentryUser: @js($plugin->getSentryUser()),
        triggerLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.trigger_label')),
        triggerAriaLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.trigger_aria_label')),
        formTitle: @js(__('filament-sentry-feedback::sentry-feedback.widget.form_title')),
        nameLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.name_label')),
        namePlaceholder: @js(__('filament-sentry-feedback::sentry-feedback.widget.name_placeholder')),
        emailLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.email_label')),
        emailPlaceholder: @js(__('filament-sentry-feedback::sentry-feedback.widget.email_placeholder')),
        messageLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.message_label')),
        messagePlaceholder: @js(__('filament-sentry-feedback::sentry-feedback.widget.message_placeholder')),
        isRequiredLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.is_required_label')),
        submitButtonLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.submit_button_label')),
        cancelButtonLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.cancel_button_label')),
        confirmButtonLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.confirm_button_label')),
        addScreenshotButtonLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.add_screenshot_button_label')),
        removeScreenshotButtonLabel: @js(__('filament-sentry-feedback::sentry-feedback.widget.remove_screenshot_button_label')),
        successMessageText: @js(__('filament-sentry-feedback::sentry-feedback.widget.success_message_text')),
    })"
>
</div>
