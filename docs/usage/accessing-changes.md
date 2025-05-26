# Accessing Changes

Now that your models are being tracked, you might want to access the changes that have been made to them.

Simply add the `CharlGottschalk\LaravelAware\Traits\ModelHasChanges` trait to your model:

```php{5,11}
<?php

namespace App\Models;

use CharlGottschalk\LaravelAware\Traits\ModelHasChanges;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ModelHasChanges, SoftDeletes;
    
    ...
```

This will add the `changes` relation to your model, and you can use [Laravel relation loading](https://laravel.com/docs/eloquent-relationships#eager-loading-multiple-relationships) to access the changes:

```php
$user = User::with('changes')->find(1);
```

This will load the changes for the model, and you can access them like this:

```php
foreach ($user->changes as $change) {
    // ...
}
```

> [!TIP]
> Read more about the [Change](/api-documentation/models#change) model
