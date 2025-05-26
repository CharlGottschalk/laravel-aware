<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Helpers;

use Illuminate\Support\Facades\Auth;

class Tracking
{
    public static function shouldTrack(): bool
    {
        return config('aware.track');
    }

    public static function shouldTrackAuthenticated(): bool
    {
        $track = static::shouldTrack();

        if (config('aware.auth')) {
            return $track && Auth::check();
        }

        return $track;
    }

    public static function shouldTrackAuto(): bool
    {
        return static::shouldTrack() && config('aware.auto');
    }

    public static function shouldTrackManually(): bool
    {
        return static::shouldTrack() && ! config('aware.auto');
    }
}
