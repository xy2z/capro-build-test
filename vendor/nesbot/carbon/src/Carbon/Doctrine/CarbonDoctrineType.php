<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\Carbon\Doctrine;

use _PhpScoper5e9ecd738c28\Doctrine\DBAL\Platforms\AbstractPlatform;
interface CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);
    public function convertToPHPValue($value, AbstractPlatform $platform);
    public function convertToDatabaseValue($value, AbstractPlatform $platform);
}
