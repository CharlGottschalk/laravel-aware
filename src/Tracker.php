<?php

namespace CharlGottschalk\LaravelAware;

use Illuminate\Database\Eloquent\Model;
use CharlGottschalk\LaravelAware\Entities\ChangeData;
use CharlGottschalk\LaravelAware\Enums\ChangeAction;
use CharlGottschalk\LaravelAware\Processors\Changes;

class Tracker
{
    public static function make(Model $model, ChangeAction $action): ChangeData
    {
        return new ChangeData($model, Changes::getChanges($model), $action);
    }
}
