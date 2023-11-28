<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Events;

use Closure;
if (!\function_exists('_PhpScoper5e9ecd738c28\\Illuminate\\Events\\queueable')) {
    /**
     * Create a new queued Closure event listener.
     *
     * @param  \Closure  $closure
     * @return \Illuminate\Events\QueuedClosure
     */
    function queueable(Closure $closure)
    {
        return new QueuedClosure($closure);
    }
}
