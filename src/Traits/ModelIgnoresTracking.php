<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Traits;

use CharlGottschalk\LaravelAware\Enums\ChangeAction;

trait ModelIgnoresTracking
{
    public function ignoreTracking(): bool
    {
        return true;
    }

    public function ignoreTrackingEvents(): array
    {
        return ChangeAction::values();
    }
}
