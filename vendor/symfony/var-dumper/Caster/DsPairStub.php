<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\Symfony\Component\VarDumper\Caster;

use _PhpScoper5e9ecd738c28\Symfony\Component\VarDumper\Cloner\Stub;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DsPairStub extends Stub
{
    public function __construct(string|int $key, mixed $value)
    {
        $this->value = [Caster::PREFIX_VIRTUAL . 'key' => $key, Caster::PREFIX_VIRTUAL . 'value' => $value];
    }
}
