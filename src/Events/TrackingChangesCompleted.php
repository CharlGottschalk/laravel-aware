<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use CharlGottschalk\LaravelAware\Models\Change;

class TrackingChangesCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public Model $model,
        public Change $change
    ) {
        //
    }
}
