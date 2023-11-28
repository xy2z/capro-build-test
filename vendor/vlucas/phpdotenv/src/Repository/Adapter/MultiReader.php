<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Dotenv\Repository\Adapter;

use _PhpScoper5e9ecd738c28\PhpOption\None;
final class MultiReader implements ReaderInterface
{
    /**
     * The set of readers to use.
     *
     * @var \Dotenv\Repository\Adapter\ReaderInterface[]
     */
    private $readers;
    /**
     * Create a new multi-reader instance.
     *
     * @param \Dotenv\Repository\Adapter\ReaderInterface[] $readers
     *
     * @return void
     */
    public function __construct(array $readers)
    {
        $this->readers = $readers;
    }
    /**
     * Read an environment variable, if it exists.
     *
     * @param non-empty-string $name
     *
     * @return \PhpOption\Option<string>
     */
    public function read(string $name)
    {
        foreach ($this->readers as $reader) {
            $result = $reader->read($name);
            if ($result->isDefined()) {
                return $result;
            }
        }
        return None::create();
    }
}
