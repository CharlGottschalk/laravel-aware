---
outline: 'deep'
---

# Helpers Namespace

```php
use CharlGottschalk\LaravelAware\Helpers
```

### Actor

::: details Static Methods

#### `fetch()`

**Arguments:**
- _`Illuminate\Database\Eloquent\Model`_ **`$model`**

**Returns:** _`CharlGottschalk\LaravelAware\Entities\ChangeActor`_

***Example:***
```php
$post = Post::find(1);
$actor = Actor::fetch($post);
```

> [!TIP]
> Read more about the [ChangeActor](/api-documentation/entities#changeactor) entity.

---

#### `make()`

**Arguments:**
- _`object|string`_ **`$actor`**
- _`null|string|int`_ **`$actorId`**

**Returns:** _`CharlGottschalk\LaravelAware\Entities\ChangeActor`_

***Example:***
```php
$actor = Actor::make(User::class, 1);

$user = User::find(1);
$actor = Actor::make($user);
```

> [!TIP]
> Read more about the [ChangeActor](/api-documentation/entities#changeactor) entity.

:::

### Ignore

::: details Static Methods

#### `model()`

**Arguments:**
- _`Illuminate\Database\Eloquent\Model`_ **`$model`**
- _`CharlGottschalk\LaravelAware\Enums\ChangeAction`_ **`$action`**

**Returns:** `bool`

**Example:**
```php
$post = new Post();
$track = Ignore::model($post, ChangeAction::CREATE);
```

> [!TIP]
> Read more about the [ChangeAction](/api-documentation/enums#changeaction) enum.

:::

### Queue

::: details Static Methods

#### `connection()`

**Returns:** `string`

**Example:**
```php
$connection = Queue::connection();
```

---

#### `queue()`

**Returns:** `string`

**Example:**
```php
$queue = Queue::queue();
```
:::

### Tracking

::: details Static Methods

#### `shouldTrack()`

**Returns:** `bool`

**Example:**
```php
$shouldTrack = Tracking::shouldTrack();
```

---

#### `shouldTrackGlobal()`

**Returns:** `bool`

**Example:**
```php
$shouldTrack = Tracking::shouldTrackGlobal();
```

---

#### `shouldTrackManually()`

**Returns:** `bool`

**Example:**
```php
$shouldTrack = Tracking::shouldTrackManually();
```
:::
