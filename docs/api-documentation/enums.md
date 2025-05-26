---
outline: 'deep'
---

# Enums Namespace

```php
use CharlGottschalk\LaravelAware\Enums
```

### ChangeAction

::: details Cases

#### `CREATE`

**Value:** `create`

---

#### `DELETE`

**Value:** `delete`

---

#### `FORCE_DELETE`

**Value:** `force_delete`

---

#### `RESTORE`

**Value:** `restore`

---

#### `UPDATE`

**Value:** `update`
:::

::: details Methods

#### `values()`

**Returns:** `array`

**Example:**

```php
return ChangeAction::values();
```

**Result:**

```php
[
  "create"
  "delete"
  "force_delete"
  "restore"
  "update"
] 
```
:::

### ChangedUsing

::: details Cases

#### `API`

**Value:** `api`

---

#### `WEB`

**Value:** `web`

---

#### `CONSOLE`

**Value:** `console`
:::

::: details Methods

#### `values()`

**Returns:** `array`

**Example:**

```php
return ChangedUsing::values();
```

**Result:**

```php
[
  "api"
  "web"
  "console"
] 
```
:::
