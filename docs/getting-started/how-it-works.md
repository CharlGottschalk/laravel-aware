# How Aware Works

Aware is a package that tracks changes to Eloquent models and provides a way to access the changes made to them.

It uses Laravel's built-in event system to listen for model events and records the changes made to the model's attributes by creating trackers that are dispatched with jobs.

Depending on your setup, tracking can be done automatically (default behaviour) by hooking into global Eloquent events that will track all models that are not [ignored](/setup/ignore) 
or you can disable automatic tracking and, by the use of a trait, track specific models via their observers.

Each time a model changes, a tracker is created and a job is dispatched to process the changes.
The job will then create a record of the changes in the database, which can be [accessed](/usage/accessing-changes) later.

By default, these jobs run synchronously, but you can also run them asynchronously by using a [queue connection](/setup/configuration) which is recommended especially in production.

The following events are tracked:
- `created`
- `updated`
- `deleted`
- `restored`
- `forceDeleted`

You can also define whether to [ignore](/setup/ignore#via-ignoretrackingevents-method) any of the tracked events.
