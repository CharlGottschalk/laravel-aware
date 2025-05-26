---
outline: 'deep'
---

# Models Namespace

```php
use CharlGottschalk\LaravelAware\Models
```

### Change

::: details Properties

#### `$actor`

**Type:** `Illuminate\Database\Eloquent\Model`

The model representing the user that performed the changes

---

#### `$reference`

**Type:** `Illuminate\Database\Eloquent\Model`

The model that the changes was made to

---

#### `$ip_address`

**Type:** `string`

The IP address of the user that made the change.

---

#### `$changed_from`

**Type:** `array`

The original values of the model's attributes before the change.

**Example Value:**
```php
[
    'name' => 'old_value',
    'email' => 'old_value',
]
```

---

#### `$changed_to`

**Type:** `array`

The new values of the model's attributes after the change.

**Example Value:**
```php
[
    'name' => 'new_value',
    'email' => 'new_value',
]
```

---

#### `$changes`

**Type:** `array`

The model's specific attributes and their changes in the following format:

**Example Value:**
```php
[
    [
        'from' => 'old_value',
        'to' => 'new_value',
        'column' => 'column_name',
    ],
]
```

---

#### `$changed_with`

**Type:** `string`

How the change was made. This can be either `console` or the action of the route where the change was made.

---

#### `$changed_using`

**Type:** `CharlGottschalk\LaravelAware\Enums\ChangedUsing`

A companion enum to `changed_with` that is either `CONSOLE`, `API` or `WEB`.

> [!TIP]
> Read more about the [ChangedUsing](/api-documentation/enums#changeusing) enum.

---

#### `$action`

**Type:** `CharlGottschalk\LaravelAware\Enums\ChangeAction`

The action that was performed. This can be either `CREATED`, `UPDATED`, `DELETED`, `RESTORED` or `FORCE_DELETED`.

> [!TIP]
> Read more about the [ChangeAction](/api-documentation/enums#changeaction) enum.

---

#### `$changed_at`

**Type:** `datetime`
The date and time when the change was made.
:::
