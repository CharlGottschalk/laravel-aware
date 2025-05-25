<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Helpers;

class Queue
{
    public static function connection(): string
    {
        return config('aware.jobs.connection');
    }

    public static function queue(): string
    {
        return config('aware.jobs.queue');
    }
}
