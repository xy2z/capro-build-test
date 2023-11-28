<?php

declare (strict_types=1);
/*
 * This file is part of the league/config package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\League\Config;

/**
 * Implement this class to facilitate setter injection of the configuration where needed
 */
interface ConfigurationAwareInterface
{
    public function setConfiguration(ConfigurationInterface $configuration) : void;
}
