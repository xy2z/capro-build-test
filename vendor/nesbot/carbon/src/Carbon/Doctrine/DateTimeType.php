<?php

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace _PhpScoper5e9ecd738c28\Carbon\Doctrine;

use _PhpScoper5e9ecd738c28\Carbon\Carbon;
use _PhpScoper5e9ecd738c28\Doctrine\DBAL\Types\VarDateTimeType;
class DateTimeType extends VarDateTimeType implements CarbonDoctrineType
{
    /** @use CarbonTypeConverter<Carbon> */
    use CarbonTypeConverter;
}