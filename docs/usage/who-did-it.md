---
outline: 'deep'
---

# Who did it

Aware for Laravel provides a simple helper class that allows you to quickly get the actor responsible for the changes on a specific model.

> [!NOTE]
> In Aware, **Actors** are any model that represents a user.

**Example:**

```php
$actor = Who::created(Post::class, $postId);
```

## Usage

### Import

```php
use CharlGottschalk\LaravelAware\Who;
```

> [!NOTE]
> Results might be null if the model has no changes or the actor is null due to the change possibly having been tracked during an unauthenticated session.

### Who performed

Arguments:
- _`string`_ `$referenceClass`: The class name of the model.
- _`string|int`_ `$referenceId`: The ID of the model.
- _`CharlGottschalk\LaraverlAware\Entities\ChangeAction`_ `$action`: The action performed on the model (e.g., `ChangeAction::CREATE`, `ChangeAction::UPDATE`, etc.).

Returns: _`Model|Collection|null`_

```php
use App\Models\Post;
use CharlGottschalk\LaravelAware\Who;
use CharlGottschalk\LaravelAware\Enums\ChangeAction;

$actor = Who::performed(Post::class, $postId, ChangeAction::UPDATE);
```

### Who created

Arguments:
- _`string|Illuminate\Database\Eloquent\Model`_ `$reference`: The model or class name of the model.
- _`string|int|null`_ `$referenceId`: The ID of the model.

Returns: _`Model|null`_

```php
use App\Models\Post;
use CharlGottschalk\LaravelAware\Who;

$post = Post::find(1);

$actor = Who::created(Post::class, $post->id);
// --or--
$users = Who::created($post);
```

### Who updated

Arguments:
- _`string|Illuminate\Database\Eloquent\Model`_ `$reference`: The model or class name of the model.
- _`string|int|null`_ `$referenceId`: The ID of the model.

Returns: _`Collection|null`_

```php
use App\Models\Post;
use CharlGottschalk\LaravelAware\Who;

$post = Post::find(1);

$actors = Who::updated(Post::class, $post->id);
// --or--
$users = Who::updated($post);
```

### Who restored

Arguments:
- _`string|Illuminate\Database\Eloquent\Model`_ `$reference`: The model or class name of the model.
- _`string|int|null`_ `$referenceId`: The ID of the model.

Returns: _`Collection|null`_

```php
use App\Models\Post;
use CharlGottschalk\LaravelAware\Who;

$post = Post::find(1);

$actors = Who::restored(Post::class, $post->id);
// --or--
$users = Who::restored($post);
```

### Who deleted

Arguments:
- _`string`_ `$referenceClass`: The model or class name of the model.
- _`string|int`_ `$referenceId`: The ID of the model.

Returns: _`Collection|null`_

```php
use App\Models\Post;
use CharlGottschalk\LaravelAware\Who;

$actors = Who::deleted(Post::class, $postId);
```

### Who force deleted

Arguments:
- _`string`_ `$referenceClass`: The class name of the model.
- _`string|int`_ `$referenceId`: The ID of the model.

Returns: _`Collection|null`_

```php
use App\Models\Post;
use CharlGottschalk\LaravelAware\Who;

$actors = Who::forceDeleted(Post::class, $postId);
```
