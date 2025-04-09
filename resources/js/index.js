import * as Sentry from '@sentry/browser'

export default function initSentryFeedback({
                                               dsn,
                                               elementId,
                                               showBranding,
                                               colorScheme,
                                               showName,
                                               isNameRequired,
                                               showEmail,
                                               isEmailRequired,
                                               enableScreenshot,
                                               sentryUser,
                                               triggerLabel,
                                               triggerAriaLabel,
                                               formTitle,
                                               nameLabel,
                                               namePlaceholder,
                                               emailLabel,
                                               emailPlaceholder,
                                               messageLabel,
                                               messagePlaceholder,
                                               isRequiredLabel,
                                               submitButtonLabel,
                                               cancelButtonLabel,
                                               confirmButtonLabel,
                                               addScreenshotButtonLabel,
                                               removeScreenshotButtonLabel,
                                               successMessageText,
                                           }) {
    return {
        init() {
            if (sentryUser) {
                Sentry.setUser({
                    fullName: sentryUser.name,
                    email: sentryUser.email,
                })
            }

            const getColorScheme = () => {
                return colorScheme === 'auto'
                    ? document.documentElement.classList.contains('dark')
                        ? 'dark'
                        : 'light'
                    : colorScheme
            }

            const initSentry = () => {
                Sentry.init({
                    dsn: dsn,
                    integrations: [
                        Sentry.feedbackIntegration({
                            autoInject: false,
                            id: elementId,
                            showBranding: showBranding,
                            colorScheme: getColorScheme(),
                            showName: showName,
                            isNameRequired: isNameRequired,
                            showEmail: showEmail,
                            isEmailRequired: isEmailRequired,
                            enableScreenshot: enableScreenshot,
                            useSentryUser: {
                                name: 'fullName',
                                email: 'email',
                            },
                            triggerLabel: triggerLabel,
                            triggerAriaLabel: triggerAriaLabel,
                            formTitle: formTitle,
                            nameLabel: nameLabel,
                            namePlaceholder: namePlaceholder,
                            emailLabel: emailLabel,
                            emailPlaceholder: emailPlaceholder,
                            messageLabel: messageLabel,
                            messagePlaceholder: messagePlaceholder,
                            isRequiredLabel: isRequiredLabel,
                            submitButtonLabel: submitButtonLabel,
                            cancelButtonLabel: cancelButtonLabel,
                            confirmButtonLabel: confirmButtonLabel,
                            addScreenshotButtonLabel: addScreenshotButtonLabel,
                            removeScreenshotButtonLabel: removeScreenshotButtonLabel,
                            successMessageText: successMessageText,
                        }),
                    ],
                })

                return Sentry.getFeedback()?.createWidget()
            }

            initSentry()

            // Watch for dark mode toggle in SPA
            new MutationObserver(() => {
                if (colorScheme === 'auto') {
                    document.getElementById(elementId).remove()
                    initSentry()
                }
            }).observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class'],
            })
        },
    }
}
