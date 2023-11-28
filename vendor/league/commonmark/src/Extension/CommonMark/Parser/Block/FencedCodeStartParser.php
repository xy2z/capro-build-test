<?php

declare (strict_types=1);
/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Parser\Block;

use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockStart;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockStartParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Cursor;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\MarkdownParserStateInterface;
final class FencedCodeStartParser implements BlockStartParserInterface
{
    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState) : ?BlockStart
    {
        if ($cursor->isIndented() || !\in_array($cursor->getNextNonSpaceCharacter(), ['`', '~'], \true)) {
            return BlockStart::none();
        }
        $indent = $cursor->getIndent();
        $fence = $cursor->match('/^[ \\t]*(?:`{3,}(?!.*`)|~{3,})/');
        if ($fence === null) {
            return BlockStart::none();
        }
        // fenced code block
        $fence = \ltrim($fence, " \t");
        return BlockStart::of(new FencedCodeParser(\strlen($fence), $fence[0], $indent))->at($cursor);
    }
}
