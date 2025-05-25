<?php

namespace CharlGottschalk\LaravelAware\Entities;

use CharlGottschalk\LaravelAware\Enums\ChangeAction;
use Illuminate\Database\Eloquent\Model;

class ChangeData
{
    public function __construct(
        public Model $model,
        public ChangedAttributes $changes,
        public ChangeAction $action
    ) {}
}
