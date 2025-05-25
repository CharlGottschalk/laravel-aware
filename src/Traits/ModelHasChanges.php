<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Traits;

use CharlGottschalk\LaravelAware\Models\Change;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method MorphMany morphMany(string $model, string $column)
 */
trait ModelHasChanges
{
    public function changes(): MorphMany
    {
        return $this->morphMany(
            Change::class,
            'reference'
        );
    }
}
