<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Entities;

class ChangeActor
{
    public function __construct(
        public ?string $actorClass,
        public null|int|string $actorId
    ) {}
}
