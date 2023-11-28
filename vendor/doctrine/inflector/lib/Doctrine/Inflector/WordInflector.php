<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Doctrine\Inflector;

interface WordInflector
{
    public function inflect(string $word) : string;
}
