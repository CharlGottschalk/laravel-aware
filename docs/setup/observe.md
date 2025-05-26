---
outline: 'deep'
---

# Manual Tracking

By default, Aware hooks into global Eloquent events to track all models automatically. 
This means that any model you create, update, or delete etc. will be tracked automatically without you having to specify anything.

If you want to disable automatic tracking, you can do so by setting the `auto` option to `false` in the `config/aware.php` file.

You can then create an observer for the models you would like to track and add the `ObserverTracksChanges` trait to it.

> [!TIP]
> Read more at [Laravel Observers](https://laravel.com/docs/eloquent#observers).

### Via ObserverTracksChanges trait

Use the `ObserverTracksChanges` trait in any model observer.

```php{6,10}
<?php

namespace App\Observers;

use App\Models\User;
use CharlGottschalk\Changes\Traits\ObserverTracksChanges;

class UserObserver
{
    use ObserverTracksChanges;
    ...
```

## Implementation

Typically, when creating [observers](https://laravel.com/docs/eloquent#observers) in Laravel you'll have a scaffolded file containing `created`, `updated`, `deleted`, etc. methods.

Since the `ObserverTracksChanges` trait overrides these methods you'll have collisions with the default Laravel methods.

### Fresh observer

On a fresh observer, you can simply use the trait and remove the default methods if you require no implementation.

```php{6,10}
<?php

namespace App\Observers;

use App\Models\User;
use CharlGottschalk\Changes\Traits\ObserverTracksChanges;

class UserObserver
{
    use ObserverTracksChanges;
    ...
```

### Existing observer

If you already have some implementation in any of the methods, you simply need to rename them to `isCreated`, `isUpdated`, `isDeleted` etc.
The trait will automatically call those methods when the corresponding event is fired.

**Example:**
```php{6,10,15,23,31,39,47}
<?php

namespace App\Observers;

use App\Models\User;
use CharlGottschalk\Changes\Traits\ObserverTracksChanges;

class UserObserver
{
    use ObserverTracksChanges;

    /**
     * Handle the User "created" event.
     */
    public function isCreated(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "updated" event.
     */
    public function isUpdated(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "deleted" event.
     */
    public function isDeleted(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "restored" event.
     */
    public function isRestored(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "forceDeleted" event.
     */
    public function isForceDeleted(User $user): void
    {
        // ...
    }
}
```

If you have some implementation in any of the preceding event methods i.e. `creating`, `updating`, `deleting` etc.,
you can simply follow the same renaming and the trait will automatically call those methods when the corresponding event is fired.

**Example:**
```php{6,10,15,23,31,39,47}
<?php

namespace App\Observers;

use App\Models\User;
use CharlGottschalk\Changes\Traits\ObserverTracksChanges;

class UserObserver
{
    use ObserverTracksChanges;

    /**
     * Handle the User "creating" event.
     */
    public function isCreating(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "updating" event.
     */
    public function isUpdating(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "deleting" event.
     */
    public function isDeleting(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "restoring" event.
     */
    public function isRestoring(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "forceDeleting" event.
     */
    public function isForceDeleting(User $user): void
    {
        // ...
    }
}
```
