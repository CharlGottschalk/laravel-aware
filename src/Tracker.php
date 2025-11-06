<?php

namespace CharlGottschalk\LaravelAware;

use CharlGottschalk\LaravelAware\Entities\ChangeData;
use CharlGottschalk\LaravelAware\Enums\ChangeAction;
use CharlGottschalk\LaravelAware\Jobs\ProcessChanges;
use CharlGottschalk\LaravelAware\Processors\Changes;
use Illuminate\Database\Eloquent\Model;

class Tracker
{
    public static function make(Model $model, ChangeAction $action): ChangeData
    {
        return new ChangeData($model, Changes::getChanges($model), $action);
    }

    public static function track(Model $model, ChangeAction $action)
    {
        $tracker = self::make($model, $action);
        ProcessChanges::dispatch($tracker);
    }
}
