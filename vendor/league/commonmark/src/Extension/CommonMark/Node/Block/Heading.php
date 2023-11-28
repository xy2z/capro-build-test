<?php

declare (strict_types=1);
/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Node\Block;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\AbstractBlock;
final class Heading extends AbstractBlock
{
    private int $level;
    public function __construct(int $level)
    {
        parent::__construct();
        $this->level = $level;
    }
    public function getLevel() : int
    {
        return $this->level;
    }
    public function setLevel(int $level) : void
    {
        $this->level = $level;
    }
}
