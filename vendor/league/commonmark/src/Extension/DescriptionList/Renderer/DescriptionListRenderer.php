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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Renderer;

use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\DescriptionList;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\ChildNodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Util\HtmlElement;
final class DescriptionListRenderer implements NodeRendererInterface
{
    /**
     * @param DescriptionList $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : HtmlElement
    {
        DescriptionList::assertInstanceOf($node);
        $separator = $childRenderer->getBlockSeparator();
        return new HtmlElement('dl', [], $separator . $childRenderer->renderNodes($node->children()) . $separator);
    }
}
