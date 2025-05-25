<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Helpers;

use CharlGottschalk\LaravelAware\Enums\ChangeAction;
use CharlGottschalk\LaravelAware\Models\Change;
use Illuminate\Database\Eloquent\Model;

class Ignore
{
    public static function model(Model $model, ChangeAction $action): bool
    {
        if ($model instanceof Change) {
            return true;
        }

        $ignore = false;

        if (method_exists(
            $model,
            'ignoreTracking'
        )) {
            $ignore = $model->ignoreTracking();
        }

        if (method_exists(
            $model,
            'ignoreTrackingEvents'
        )) {
            $ignore = in_array($action->value, $model->ignoreTrackingEvents());
        }

        if (in_array(
            get_class($model),
            config('aware.ignore')
        )) {
            $ignore = true;
        }

        return $ignore;
    }
}
