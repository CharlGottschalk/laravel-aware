<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use CharlGottschalk\LaravelAware\Entities\ChangeActor;
use CharlGottschalk\LaravelAware\Helpers\Actor;
use CharlGottschalk\LaravelAware\Models\Change;

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
