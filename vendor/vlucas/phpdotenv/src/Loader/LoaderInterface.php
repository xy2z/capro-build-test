<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Dotenv\Loader;

use _PhpScoper5e9ecd738c28\Dotenv\Repository\RepositoryInterface;
interface LoaderInterface
{
    /**
     * Load the given entries into the repository.
     *
     * @param \Dotenv\Repository\RepositoryInterface $repository
     * @param \Dotenv\Parser\Entry[]                 $entries
     *
     * @return array<string,string|null>
     */
    public function load(RepositoryInterface $repository, array $entries);
}
