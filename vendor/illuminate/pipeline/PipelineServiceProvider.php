<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Pipeline;

use _PhpScoper5e9ecd738c28\Illuminate\Contracts\Pipeline\Hub as PipelineHubContract;
use _PhpScoper5e9ecd738c28\Illuminate\Contracts\Support\DeferrableProvider;
use _PhpScoper5e9ecd738c28\Illuminate\Support\ServiceProvider;
class PipelineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PipelineHubContract::class, Hub::class);
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [PipelineHubContract::class];
    }
}
