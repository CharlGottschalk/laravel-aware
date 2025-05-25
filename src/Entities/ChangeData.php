<?php

namespace CharlGottschalk\LaravelAware\Entities;

use Illuminate\Database\Eloquent\Model;
use CharlGottschalk\LaravelAware\Enums\ChangeAction;

class ChangeData
{
    public function __construct(
        public Model $model,
        public ChangedAttributes $changes,
        public ChangeAction $action
    ) {}
}
