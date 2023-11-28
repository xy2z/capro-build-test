<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Dotenv\Repository\Adapter;

interface ReaderInterface
{
    /**
     * Read an environment variable, if it exists.
     *
     * @param non-empty-string $name
     *
     * @return \PhpOption\Option<string>
     */
    public function read(string $name);
}
