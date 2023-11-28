<?php

declare (strict_types=1);
/*
 * This is part of the league/commonmark package.
 *
 * (c) Martin Hasoň <martin.hason@gmail.com>
 * (c) Webuni s.r.o. <info@webuni.cz>
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Table;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\ChildNodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Util\HtmlElement;
use _PhpScoper5e9ecd738c28\League\CommonMark\Xml\XmlNodeRendererInterface;
final class TableRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param Table $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : \Stringable
    {
        Table::assertInstanceOf($node);
        $attrs = $node->data->get('attributes');
        $separator = $childRenderer->getInnerSeparator();
        $children = $childRenderer->renderNodes($node->children());
        return new HtmlElement('table', $attrs, $separator . \trim($children) . $separator);
    }
    public function getXmlTagName(Node $node) : string
    {
        return 'table';
    }
    /**
     * {@inheritDoc}
     */
    public function getXmlAttributes(Node $node) : array
    {
        return [];
    }
}
