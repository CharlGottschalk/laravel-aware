<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Helpers;

use CharlGottschalk\LaravelAware\Entities\ChangeActor;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Actor
{
    /**
     * @throws Exception
     */
    public static function fetch(?Model $model = null): ChangeActor
    {
        if ($model !== null && method_exists(
            $model,
            'getActor'
        )) {
            return $model::getActor();
        }

        if (Auth::check()) {
            return self::authActor();
        }

        return self::nullActor();
    }

    /**
     * @throws Exception
     */
    public static function make(
        object|string $actor,
        null|string|int $actorId = null
    ): ChangeActor {
        if (is_string($actor) && class_exists($actor)) {
            return new ChangeActor(
                actorClass: $actor,
                actorId: $actorId
            );
        }

        $id = $actor->id ?? $actorId;

        return new ChangeActor(
            actorClass: get_class($actor),
            actorId: $id
        );
    }

    /**
     * @throws Exception
     */
    private static function authActor(): ChangeActor
    {
        $user = Auth::user();

        return new ChangeActor(
            actorClass: get_class($user),
            actorId: Auth::id()
        );
    }

    /**
     * @throws Exception
     */
    private static function nullActor(): ChangeActor
    {
        return new ChangeActor(
            actorClass: null,
            actorId: null
        );
    }
}
