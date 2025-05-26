<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware;

use CharlGottschalk\LaravelAware\Enums\ChangeAction;
use CharlGottschalk\LaravelAware\Models\Change;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Who
{
    public static function performed(
        string $referenceClass,
        string|int $referenceId,
        ChangeAction $action = ChangeAction::CREATE,
    ): Model|Collection|null {
        return self::getActorResult(
            referenceClass: $referenceClass,
            referenceId   : $referenceId,
            action        : $action,
        );
    }

    public static function created(
        string|Model $reference,
        string|int|null $referenceId = null
    ): Model|Collection|null {
        return self::getActor(
            reference: $reference,
            referenceId: $referenceId
        );
    }

    public static function deleted(
        string $referenceClass,
        string|int $referenceId = null
    ): Collection|null {
        return self::performed(
            referenceClass  : $referenceClass,
            referenceId: $referenceId,
            action     : ChangeAction::DELETE
        );
    }

    public static function forceDeleted(
        string $referenceClass,
        string|int $referenceId
    ): Collection|null {
        return self::performed(
            referenceClass  : $referenceClass,
            referenceId: $referenceId,
            action     : ChangeAction::FORCE_DELETE
        );
    }

    public static function restored(
        string|Model $reference,
        string|int|null $referenceId = null
    ): Collection|null {
        return self::getActor(
            reference  : $reference,
            referenceId: $referenceId,
            action     : ChangeAction::RESTORE
        );
    }

    public static function updated(
        string|Model $reference,
        string|int|null $referenceId = null
    ): Collection|null {
        return self::getActor(
            reference  : $reference,
            referenceId: $referenceId,
            action     : ChangeAction::UPDATE
        );
    }

    private static function getActor(
        string|Model $reference,
        string|int|null $referenceId = null,
        ChangeAction $action = ChangeAction::CREATE,
    ) {
        if ($reference instanceof Model) {
            return static::performed(
                referenceClass: get_class($reference),
                referenceId   : $reference->id,
                action        : $action
            );
        }

        return static::performed(
            referenceClass: $reference,
            referenceId   : $referenceId,
            action        : $action
        );
    }

    private static function getActorResult(
        string $referenceClass,
        string|int $referenceId,
        ChangeAction $action,

    ): null|Collection|Model {
        $changes = self::getQuery(
            referenceClass: $referenceClass,
            referenceId: $referenceId,
            action: $action
        );

        if ($changes->isEmpty()) {
            return null;
        }

        if ($action == ChangeAction::CREATE) {
            return $changes->first()->actor;
        }

        if ($changes instanceof EloquentCollection) {
            return $changes->pluck('actor');
        }

        return $changes->actor;
    }

    private static function getQuery(
        string $referenceClass,
        string|int $referenceId,
        ChangeAction $action
    ): Model|EloquentCollection {
        return Change::where(
            'reference_type',
            $referenceClass
        )
            ->where(
                'reference_id',
                $referenceId
            )
            ->where(
                'action',
                $action
            )
            ->get();
    }
}
