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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\AbstractBlock;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\TightBlockInterface;
class Description extends AbstractBlock implements TightBlockInterface
{
    private bool $tight;
    public function __construct(bool $tight = \false)
    {
        parent::__construct();
        $this->tight = $tight;
    }
    public function isTight() : bool
    {
        return $this->tight;
    }
    public function setTight(bool $tight) : void
    {
        $this->tight = $tight;
    }
}
