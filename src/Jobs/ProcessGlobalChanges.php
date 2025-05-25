<?php

namespace CharlGottschalk\LaravelAware\Jobs;

use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use CharlGottschalk\LaravelAware\Entities\ChangeData;
use CharlGottschalk\LaravelAware\Helpers\Actor;
use CharlGottschalk\LaravelAware\Helpers\Ignore;
use CharlGottschalk\LaravelAware\Helpers\Queue;
use CharlGottschalk\LaravelAware\Helpers\Tracking;
use CharlGottschalk\LaravelAware\Processors\Changes;

class ProcessGlobalChanges implements ShouldQueue
{
    use Queueable;

    /**
     * @param  ChangeData[]  $data
     */
    public function __construct(
        public array $data
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
        foreach ($this->data as $data) {
            if (! Ignore::model($data->model, $data->action)) {
                Changes::by(Actor::fetch($data->model))
                    ->trackChanges(
                        $data->model,
                        $data->action,
                        $data->changes
                    );
            }
        }
    }
}
