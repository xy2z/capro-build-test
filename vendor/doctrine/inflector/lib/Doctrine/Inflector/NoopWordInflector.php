<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Doctrine\Inflector;

class NoopWordInflector implements WordInflector
{
    public function inflect(string $word) : string
    {
        return $word;
    }
}
