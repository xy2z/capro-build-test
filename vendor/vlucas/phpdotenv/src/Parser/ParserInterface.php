<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Dotenv\Parser;

interface ParserInterface
{
    /**
     * Parse content into an entry array.
     *
     * @param string $content
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return \Dotenv\Parser\Entry[]
     */
    public function parse(string $content);
}
