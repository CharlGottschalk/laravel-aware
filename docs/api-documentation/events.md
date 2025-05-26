---
outline: 'deep'
---

### Namespace

```php
use CharlGottschalk\LaravelAware\Events
```

### TrackingChangesCompleted

::: details Properties

#### `$model`

**Type:** _`Illuminate\Database\Eloquent\Model`_

---

#### `$change`

**Type:** _`CharlGottschalk\LaravelAware\Models\Change`_

> [!TIP]
> Read more about the [Change](/api-documentation/models) model.
:::

### TrackingChangesFailed

::: details Properties

#### `$model`

**Type:** _`Illuminate\Database\Eloquent\Model`_

---

#### `$changes`

**Type:** _`CharlGottschalk\LaravelAware\Entities\ChangedAttributes`_

> [!TIP]
> Read more about the [ChangedAttributes](/api-documentation/entities#changedattributes) entity.
:::

### TrackingChangesStarted

::: details Properties

#### `$model`

**Type:** _`Illuminate\Database\Eloquent\Model`_

---

#### `$changes`

**Type:** _`array`_

An array representation of the [Change](/api-documentation/models) model.
:::
