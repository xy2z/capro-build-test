<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Bus\Events;

use _PhpScoper5e9ecd738c28\Illuminate\Bus\Batch;
class BatchDispatched
{
    /**
     * The batch instance.
     *
     * @var \Illuminate\Bus\Batch
     */
    public $batch;
    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Bus\Batch  $batch
     * @return void
     */
    public function __construct(Batch $batch)
    {
        $this->batch = $batch;
    }
}
