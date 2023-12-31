<?php

namespace _PhpScoper5e9ecd738c28\Spatie\YamlFrontMatter;

use _PhpScoper5e9ecd738c28\Symfony\Component\Yaml\Yaml;
class YamlFrontMatter
{
    public static function parse(string $content) : Document
    {
        $pattern = '/^[\\s\\r\\n]?---[\\s\\r\\n]?$/sm';
        $parts = \preg_split($pattern, \PHP_EOL . \ltrim($content));
        if (\count($parts) < 3) {
            return new Document([], $content);
        }
        $matter = Yaml::parse(\trim($parts[1]));
        $body = \implode(\PHP_EOL . '---' . \PHP_EOL, \array_slice($parts, 2));
        return new Document($matter, $body);
    }
    /**
     * A parser that can handle Markdown that contains Markdown.
     */
    public static function markdownCompatibleParse(string $content) : Document
    {
        return (new ComplexMarkdownParser($content))->parse();
    }
    public static function parseFile(string $path) : Document
    {
        return static::parse(\file_get_contents($path));
    }
}
