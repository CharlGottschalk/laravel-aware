<?php

declare(strict_types=1);

namespace CharlGottschalk\LaravelAware\Events;

use CharlGottschalk\LaravelAware\Models\Change;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

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
