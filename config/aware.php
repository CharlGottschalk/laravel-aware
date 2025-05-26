<?php

return [
    /**
     * Enable tracking.
     */
    'track' => env('AWARE_TRACK', true),

    /**
     * Automatically track changes for all models.
     */
    'auto' => env('AWARE_AUTO', true),

    /**
     * Track only during authenticated sessions.
     */
    'auth' => env('AWARE_AUTH', true),

    /**
     * Opt-out these models from tracking changes.
     *
     * Note:
     * Overrides `$model->ignoreTracking()`.
     * Overrides `$model->ignoreTrackingEvents()`.
     * Overrides `ModelIgnoresTracking` trait.
     */
    'ignore' => [],

    /**
     * Specify the queue connection and queue to use for the processing of changes.
     * Set connection to 'sync' if you want processing to happen synchronously.
     */
    'jobs' => [
        'connection' => env('AWARE_QUEUE_CONNECTION', 'sync'),
        'queue' => env('AWARE_QUEUE', 'default'),
    ],
];
