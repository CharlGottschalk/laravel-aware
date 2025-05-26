---
outline: 'deep'
---

# Configuration

::: details config/aware.php
```php
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

```
:::

::: details .env
```dotenv
AWARE_TRACK=true
AWARE_AUTO=true
AWARE_AUTH=true
AWARE_QUEUE_CONNECTION=sync
AWARE_QUEUE=default
```
:::

### `track`

- **Type:** `bool`
- **Default:** `true`

Enable tracking

`.env`: `AWARE_TRACK=true`

---

### `auto`

- **Type:** `bool`
- **Default:** `true`

If set to `true`, all models that are not [ignored](/setup/ignore) will be tracked automatically.

`.env`: `AWARE_AUTO=true`

---

### `auth`

- **Type:** `bool`
- **Default:** `true`

If set to `true`, models will only be tracked during authenticated sessions.

`.env`: `AWARE_AUTH=true`

---

### `ignore`

- **Type:** `array`
- **Default:** `[]`

A list of model classes to ignore. This will override any other ignore settings on the model itself.

**Example:**
```php
[
    App\Models\User::class,
    App\Models\Role::class,
]
```

---

### `jobs.connection`

- **Type:** `string`
- **Default:** `sync`

By default, jobs run synchronously (`sync`), but you can set this to any queue connection defined in your `config/queue.php` file to run asynchronously.

`.env`: `AWARE_QUEUE_CONNECTION=sync`

> [!IMPORTANT]
> I recommend you use the `sync` connection for local development and testing, but switch to a queue connection like `database`, `redis`, or any other supported queue driver in production.

---

### `jobs.queue`

- **Type:** `string`
- **Default:** `default`

Here you can specify the queue to use for the processing of changes.

`.env`: `AWARE_QUEUE_CONNECTION=sync`

