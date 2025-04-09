import * as Sentry from "@sentry/browser";

Sentry.init({
    dsn: "https://4b2bf3b134795c264420402d976ce061@o4509124430331904.ingest.de.sentry.io/4509124436820049",
    integrations: [
        Sentry.feedbackIntegration({
            colorScheme: "system",
            isEmailRequired: true,
        }),
    ]
});
