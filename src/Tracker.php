<?php

namespace CharlGottschalk\LaravelAware;

use CharlGottschalk\LaravelAware\Entities\ChangeData;
use CharlGottschalk\LaravelAware\Enums\ChangeAction;
use CharlGottschalk\LaravelAware\Processors\Changes;
use Illuminate\Database\Eloquent\Model;

class Tracker
{
    public static function make(Model $model, ChangeAction $action): ChangeData
    {
        return new ChangeData($model, Changes::getChanges($model), $action);
    }
}
