<?php

namespace _PhpScoper5e9ecd738c28\Psr\Clock;

use DateTimeImmutable;
interface ClockInterface
{
    /**
     * Returns the current time as a DateTimeImmutable Object
     */
    public function now() : DateTimeImmutable;
}
