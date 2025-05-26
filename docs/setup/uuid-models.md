# UUID Models

Aware assumes your models use incrementing integer IDs as primary keys.
If your models use UUIDs instead, you need to make a few changes to the aware migration.

In the migration file `database/migrations/xxxx_xx_xx_xxxxxx_create_changes_table.php`, make the following changes after you ran the `php artisan aware:install` command and before running `php artisan migrate`:

Update the migration as follows:

```php
$table->nullableMorphs('actor'); // [!code --]
$table->morphs('reference'); // [!code --]
$table->nullableUuidMorphs('actor'); // [!code ++]
$table->uuidMorphs('reference'); // [!code ++]
```

> [!NOTE]
> The migration also includes comments to indicate the changes you need to make.

After making these changes, you can run the migration: `php artisan migrate`.
