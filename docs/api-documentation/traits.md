---
title: /Traits
description: 
navigation: true
---

# Traits Namespace

```php
use CharlGottschalk\LaravelAware\Traits
```

### ModelHasChanges

::: details Methods

#### `changes()`

**Returns:** `Illuminate\Database\Eloquent\Relations\MorphMany`

**Example:**
```php
$post = Post::with('changes')->find(1);
$changes = $post->changes;
```

> [!TIP]
> Read more about the [Change](/api-documentation/models) model.

> [!TIP]
> Read more about [Accessing Changes](/usage/accessing-changes).
:::

### ModelIgnoresTracking

::: details Methods

#### `ignoreTracking()`

**Returns:** `bool`

> [!TIP]
> Read more about the [ignoreTracking](/setup/ignore#via-ignoretracking-method) method.

---

#### `ignoreTrackingEvents()`

**Returns:** `array`

> [!TIP]
> Read more about the [ignoreTrackingEvents](/setup/ignore#via-ignoretrackingevents-method) method.
:::

### ObserverTracksChanges

::: details Methods

- `*ing()` methods are used to create a tracker with changes.
- `*ed()` methods are used to dispatch a job to record changes.

#### `creating()`

**Returns:** `void`

---

#### `created()`

**Returns:** `void`

---

#### `updating()`

**Returns:** `void`

---

#### `updated()`

**Returns:** `void`

---

#### `deleting()`

**Returns:** `void`

---

#### `deleted()`

**Returns:** `void`

---

#### `restoring()`

**Returns:** `void`

---

#### `restored()`

**Returns:** `void`

---

#### `forceDeleting()`

**Returns:** `void`

---

#### `forceDeleted()`

**Returns:** `void`
:::
