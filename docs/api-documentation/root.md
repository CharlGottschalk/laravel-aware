---
outline: 'deep'
---

# Root Namespace

```php
use CharlGottschalk\LaravelAware
```

### Tracker

::: details Methods

#### `make()`

**Arguments:**
- _`Illuminate\Database\Eloquent\Model`_ **`$model`**
- _`CharlGottschalk\LaravelAware\Enums\ChangeAction`_ **`$action`**

**Returns:** _`CharlGottschalk\LaravelAware\Entities\ChangeData`_

**Example:**
```php
$post = Post::find(1);
$post->title = 'New title';
$changes = Tracker::make($post, ChangeAction::UPDATE);
```

> [!TIP]
> Read more about the [ChangeData](/api-documentation/entities#changedata) entity.

> [!TIP]
> Read more about the [ChangeAction](/api-documentation/enums#changeaction) enum.
:::

### Who

::: details Methods

#### `performed()`

**Arguments:**
- _`string`_ **`$referenceClass`**
- _`string|int`_ **`$referenceId`**
- _`CharlGottschalk\LaravelAware\Enums\ChangeAction`_ **`$action`**

**Returns:** _`null|Illuminate\Support\Collection|Illuminate\Database\Eloquent\Model`_

**Example:**
```php
$post = Post::find(1);
$user = Who::performed(Post::class, $post->id, ChangeAction::UPDATE);
```

> [!TIP]
> Read more about the [ChangeAction](/api-documentation/enums#changeaction) enum.

---

#### `created()`

**Arguments:**
- _`string|Illuminate\Database\Eloquent\Model`_ **`$reference`**
- _`string|int|null`_ **`$referenceId`**

**Returns:** _`null|Illuminate\Database\Eloquent\Model`_

**Example:**
```php
$post = Post::find(1);
$user = Who::created(Post::class, $post->id);
// --or--
$users = Who::created($post);
```

---

#### `updated()`

**Arguments:**
- _`string|Illuminate\Database\Eloquent\Model`_ **`$reference`**
- _`string|int|null`_ **`$referenceId`**

**Returns:** _`null|Illuminate\Support\Collection`_

**Example:**
```php
$post = Post::find(1);
$users = Who::updated(Post::class, $post->id);
// --or--
$users = Who::updated($post);
```

---

#### `restored()`

**Arguments:**
- _`string|Illuminate\Database\Eloquent\Model`_ **`$reference`**
- _`string|int|null`_ **`$referenceId`**

**Returns:** _`null|Illuminate\Support\Collection`_

**Example:**
```php
$post = Post::find(1);
$users = Who::restored(Post::class, $post->id);
// --or--
$users = Who::restored($post);
```

---

#### `deleted()`

**Arguments:**
- _`string`_ **`$referenceClass`**
- _`string|int`_ **`$referenceId`**

**Returns:** _`null|Illuminate\Support\Collection`_

**Example:**
```php
$users = Who::deleted(Post::class, $post->id);
```

---

#### `forceDeleted()`

**Arguments:**
- _`string`_ **`$referenceClass`**
- _`string|int`_ **`$referenceId`**

**Returns:** _`null|Illuminate\Support\Collection`_

**Example:**
```php
$users = Who::forceDeleted(Post::class, $postId);
```
:::
