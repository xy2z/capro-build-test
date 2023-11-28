<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Support;

use _PhpScoper5e9ecd738c28\Carbon\Carbon as BaseCarbon;
use _PhpScoper5e9ecd738c28\Carbon\CarbonImmutable as BaseCarbonImmutable;
class Carbon extends BaseCarbon
{
    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseCarbon::setTestNow($testNow);
        BaseCarbonImmutable::setTestNow($testNow);
    }
}
