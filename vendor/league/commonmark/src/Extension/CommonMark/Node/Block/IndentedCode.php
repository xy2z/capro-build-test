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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Node\Block;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\AbstractBlock;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\StringContainerInterface;
final class IndentedCode extends AbstractBlock implements StringContainerInterface
{
    private string $literal = '';
    public function getLiteral() : string
    {
        return $this->literal;
    }
    public function setLiteral(string $literal) : void
    {
        $this->literal = $literal;
    }
}
