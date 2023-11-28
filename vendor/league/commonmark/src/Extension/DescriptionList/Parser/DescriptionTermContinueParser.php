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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Parser;

use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\DescriptionTerm;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockContinue;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockContinueParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockContinueParserWithInlinesInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Cursor;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\InlineParserEngineInterface;
final class DescriptionTermContinueParser extends AbstractBlockContinueParser implements BlockContinueParserWithInlinesInterface
{
    private DescriptionTerm $block;
    private string $term;
    public function __construct(string $term)
    {
        $this->block = new DescriptionTerm();
        $this->term = $term;
    }
    public function getBlock() : DescriptionTerm
    {
        return $this->block;
    }
    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser) : ?BlockContinue
    {
        return BlockContinue::finished();
    }
    public function parseInlines(InlineParserEngineInterface $inlineParser) : void
    {
        if ($this->term !== '') {
            $inlineParser->parse($this->term, $this->block);
        }
    }
}
