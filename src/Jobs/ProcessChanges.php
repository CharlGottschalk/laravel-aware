<?php

namespace CharlGottschalk\LaravelAware\Jobs;

use CharlGottschalk\LaravelAware\Entities\ChangeData;
use CharlGottschalk\LaravelAware\Helpers\Actor;
use CharlGottschalk\LaravelAware\Helpers\Ignore;
use CharlGottschalk\LaravelAware\Helpers\Queue;
use CharlGottschalk\LaravelAware\Processors\Changes;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessChanges implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public ChangeData $data
    ) {

        $this->onConnection(Queue::connection());
        $this->onQueue(Queue::queue());
    }

    /**
     * Execute the job.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        if (! Ignore::model($this->data->model, $this->data->action)) {
            Changes::by(Actor::fetch($this->data->model))
                ->trackChanges(
                    $this->data->model,
                    $this->data->action,
                    $this->data->changes
                );
        }
    }
}
