<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Support\Facades;

/**
 * @method static void setUpProcess(callable $callback)
 * @method static void setUpTestCase(callable $callback)
 * @method static void setUpTestDatabase(callable $callback)
 * @method static void tearDownProcess(callable $callback)
 * @method static void tearDownTestCase(callable $callback)
 * @method static int|false token()
 *
 * @see \Illuminate\Testing\ParallelTesting
 */
class ParallelTesting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \_PhpScoper5e9ecd738c28\Illuminate\Testing\ParallelTesting::class;
    }
}
