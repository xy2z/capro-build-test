<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Contracts\Foundation;

interface CachesRoutes
{
    /**
     * Determine if the application routes are cached.
     *
     * @return bool
     */
    public function routesAreCached();
    /**
     * Get the path to the routes cache file.
     *
     * @return string
     */
    public function getCachedRoutesPath();
}
