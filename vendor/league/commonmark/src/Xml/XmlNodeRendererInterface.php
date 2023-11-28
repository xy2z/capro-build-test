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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Xml;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
interface XmlNodeRendererInterface
{
    public function getXmlTagName(Node $node) : string;
    /**
     * @return array<string, string|int|float|bool>
     *
     * @psalm-return array<string, scalar>
     */
    public function getXmlAttributes(Node $node) : array;
}
