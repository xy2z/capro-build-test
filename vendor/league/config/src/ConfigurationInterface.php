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

use _PhpScoper5e9ecd738c28\League\Config\Exception\UnknownOptionException;
use _PhpScoper5e9ecd738c28\League\Config\Exception\ValidationException;
/**
 * Interface for reading configuration values
 */
interface ConfigurationInterface
{
    /**
     * @param string $key Configuration option path/key
     *
     * @psalm-param non-empty-string $key
     *
     * @return mixed
     *
     * @throws ValidationException if the schema failed to validate the given input
     * @throws UnknownOptionException if the requested key does not exist or is malformed
     */
    public function get(string $key);
    /**
     * @param string $key Configuration option path/key
     *
     * @psalm-param non-empty-string $key
     *
     * @return bool Whether the given option exists
     *
     * @throws ValidationException if the schema failed to validate the given input
     */
    public function exists(string $key) : bool;
}
