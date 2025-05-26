---
outline: 'deep'
---

# Events

Aware for Laravel currently dispatches 3 events when tracking changes on models. 
You can listen to these events to perform additional actions.

## Available events

### `TrackingChangesStarted`

When tracking of changes starts, this event is dispatched.

__Properties__: 
- _`Illuminate\Database\Eloquent\Model`_ `$model`
- _`array`_ `$changes`

> [!TIP]
> `$changes` is an array representation of the [Change](/api-documentation/models) model.

### `TrackingChangesCompleted`

When tracking successfully completes, this event is dispatched.

___Properties___: 
- _`Illuminate\Database\Eloquent\Model`_ `$model`
- _`CharlGottschalk\LaravelAware\Models\Change`_ `$change`

> [!TIP]
> Read more about the [Change](/api-documentation/models) model.

### `TrackingChangesFailed`

When tracking fails due to an error, this event is dispatched.

___Properties___: 
- _`Illuminate\Database\Eloquent\Model`_ `$model`
- _`CharlGottschalk\LaravelAware\Entities\ChangedAttributes`_ `$changes`
- _`Throwable`_ `$exception`

> [!TIP]
> Read more the [ChangedAttributes](/api-documentation/entities#changedattributes) entity.

### Listening to events

> [!TIP]
> Read more at [Laravel Events](https://laravel.com/docs/events).

You can listen to these events in your application by creating for instance, a subscriber class.

```php
<?php
 
namespace App\Listeners;
 
use CharlGottschalk\LaravelAware\Events\TrackingChangesStarted;
use CharlGottschalk\LaravelAware\Events\TrackingChangesCompleted;
use CharlGottschalk\LaravelAware\Events\TrackingChangesFailed;
use Illuminate\Events\Dispatcher;
 
class TrackingChangesSubscriber
{
    /**
     * Handle tracking started events.
     */
    public function handleTrackingChangesStarted(TrackingChangesStarted $event): void {
        $model = $event->model;
        $changes = $event->changes;
        // ...
    }
 
    /**
     * Handle tracking completed events.
     */
    public function handleTrackingChangesCompleted(TrackingChangesCompleted $event): void {
        $model = $event->model;
        $change = $event->change;
        
        // ...
    }
    
    /**
     * Handle tracking failed events.
     */
    public function handleTrackingChangesFailed(TrackingChangesFailed $event): void {
        $model = $event->model;
        $changes = $event->changes;
        $exception = $event->exception;
        
        // ...
    }
 
    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            TrackingChangesStarted::class,
            [TrackingChangesSubscriber::class, 'handleTrackingChangesStarted']
        );
        
        $events->listen(
            TrackingChangesCompleted::class,
            [TrackingChangesSubscriber::class, 'handleTrackingChangesCompleted']
        );
        
        $events->listen(
            TrackingChangesFailed::class,
            [TrackingChangesSubscriber::class, 'handleTrackingChangesFailed']
        );
    }
}
```
