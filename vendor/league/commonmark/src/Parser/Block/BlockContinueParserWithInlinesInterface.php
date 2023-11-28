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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block;

use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\InlineParserEngineInterface;
interface BlockContinueParserWithInlinesInterface extends BlockContinueParserInterface
{
    /**
     * Parse any inlines inside of the current block
     */
    public function parseInlines(InlineParserEngineInterface $inlineParser) : void;
}
