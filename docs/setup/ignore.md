---
outline: 'deep'
---

# Ignoring Models

You can exclude models from being tracked in various ways:

### Via ignore array

Simply add the model class to the `ignore` array in the `config/aware.php` file.

> [!IMPORTANT]
> Note that this will override all other methods of ignoring tracking.

```php
'ignore' => [
    App\Models\User::class,
],
```

### Via ModelIgnoresTracking trait

Simply use the `ModelIgnoresTracking` trait in the model class to exclude model from all events.

```php{5,11}
<?php

namespace App\Models;

use CharlGottschalk\Changes\Traits\ModelIgnoresTracking;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ModelIgnoresTracking, SoftDeletes;
    
    ...
```

### Via ignoreTracking() method

Simply add a `public` `ignoreTracking()` method to any model.

Return `true` to exclude from tracking, `false` otherwise.

> [!IMPORTANT]
> Note that this will override `ignoreTrackingEvents()` method.

```php{12-15}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    
    public function ignoreTracking(): bool
    {
        return true;
    }
    
    ...
```

### Via ignoreTrackingEvents() method

You can exclude tracking for specific events like `created`, `updated`, `deleted`, `restored` and `forceDeleted`
by simply adding a `public` `ignoreTrackingEvents()` method to any model and returning an array with the events to ignore.

```php{12-18}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    
    public function ignoreTrackingEvents(): array
    {
        return [
            'create',
            'restore',
        ];
    }
    
    ...
```
