<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Events;

use _PhpScoper5e9ecd738c28\Illuminate\Contracts\Queue\Factory as QueueFactoryContract;
use _PhpScoper5e9ecd738c28\Illuminate\Support\ServiceProvider;
class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('events', function ($app) {
            return (new Dispatcher($app))->setQueueResolver(function () use($app) {
                return $app->make(QueueFactoryContract::class);
            });
        });
    }
}
