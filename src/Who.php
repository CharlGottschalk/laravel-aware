<?php

declare(strict_types=1);

namespace OneOne8\LaravelAware;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use OneOne8\LaravelAware\Enums\ChangeAction;
use OneOne8\LaravelAware\Models\Change;

class Who
{
    public static function performed(
        string $referenceType,
        string|int $referenceId,
        ChangeAction $action = ChangeAction::CREATE,
    ): Model|Collection|null {
        return self::getActorResult(
            referenceType: $referenceType,
            referenceId: $referenceId,
            action: $action,
        );
    }

    public static function created(
        string $referenceType,
        string|int $referenceId
    ): Model|Collection|null {
        return self::performed(
            referenceType: $referenceType,
            referenceId: $referenceId
        );
    }

    public static function deleted(
        string $referenceType,
        string|int $referenceId
    ): Model|Collection|null {
        return self::performed(
            referenceType: $referenceType,
            referenceId: $referenceId,
            action: ChangeAction::DELETE
        );
    }

    public static function forceDeleted(
        string $referenceType,
        string|int $referenceId
    ): Model|Collection|null {
        return self::performed(
            referenceType: $referenceType,
            referenceId: $referenceId,
            action: ChangeAction::FORCE_DELETE
        );
    }

    public static function restored(
        string $referenceType,
        string|int $referenceId
    ): Model|Collection|null {
        return self::performed(
            referenceType: $referenceType,
            referenceId: $referenceId,
            action: ChangeAction::RESTORE
        );
    }

    public static function updated(
        string $referenceType,
        string|int $referenceId
    ): Model|Collection|null {
        return self::performed(
            referenceType: $referenceType,
            referenceId: $referenceId,
            action: ChangeAction::UPDATE
        );
    }

    private static function getActorResult(
        string $referenceType,
        string|int $referenceId,
        ChangeAction $action,

    ): null|Collection|Model {
        $changes = self::getQuery(
            $referenceType,
            $referenceId,
            $action
        );

        if ($changes->isEmpty()) {
            return null;
        }

        if ($changes instanceof EloquentCollection) {
            return $changes->pluck('actor');
        }

        return $changes->actor;
    }

    private static function getQuery(
        string $referenceType,
        string|int $referenceId,
        ChangeAction $action
    ): EloquentCollection {
        $changes = Change::where(
            'reference_type',
            $referenceType
        )
            ->where(
                'reference_id',
                $referenceId
            )
            ->where(
                'action',
                $action
            );

        if ($action == ChangeAction::CREATE) {
            return $changes->first();
        }

        return $changes->get();
    }
}
