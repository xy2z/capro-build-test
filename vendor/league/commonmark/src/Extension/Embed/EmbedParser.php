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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Embed;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\AbstractBlock;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockContinue;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockContinueParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Cursor;
class EmbedParser implements BlockContinueParserInterface
{
    private Embed $embed;
    public function __construct(string $url)
    {
        $this->embed = new Embed($url);
    }
    public function getBlock() : AbstractBlock
    {
        return $this->embed;
    }
    public function isContainer() : bool
    {
        return \false;
    }
    public function canHaveLazyContinuationLines() : bool
    {
        return \false;
    }
    public function canContain(AbstractBlock $childBlock) : bool
    {
        return \false;
    }
    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser) : ?BlockContinue
    {
        return BlockContinue::none();
    }
    public function addLine(string $line) : void
    {
    }
    public function closeBlock() : void
    {
    }
}
