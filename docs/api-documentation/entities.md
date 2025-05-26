---
outline: 'deep'
---

# Entities Namespace

```php
use CharlGottschalk\LaravelAware\Entities
```

### ChangeActor

::: details Properties

#### `$actorClass`

**Type:** _`null|string`_

---

#### `$actorId`

**Type:** _`null|string|int`_
:::

### ChangeData

::: details Properties

#### `$model`

**Type:** _`Illuminate\Database\Eloquent\Model`_

---

#### `$changes`

**Type:** _`CharlGottschalk\LaravelAware\Entities\ChangedAttributes`_

---

#### `$action`

**Type:** _`CharlGottschalk\LaravelAware\Enums\ChangeAction`_

> [!TIP]
> Read more about the [ChangeAction](/api-documentation/enums#changeaction) enum.
:::

### ChangedAttributes

::: details Properties

#### `$changes`

**Type:** _`Illuminate\Support\Collection|array`_

**Example Value:**
```php
[
    'name' => 'new_value',
    'email' => 'new_value',
]
```

---

#### `$original`

**Type:** _`Illuminate\Support\Collection|array`_

**Example Value:**
```php
[
    'name' => 'old_value',
    'email' => 'old_value',
]
```

---

#### `$changed`

**Type:** _`Illuminate\Support\Collection|array`_

**Example Value:**
```php
[
    [
        'from' => 'old_value',
        'to' => 'new_value',
        'column' => 'column_name'
    ],
    ...
]
```
:::
