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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Renderer\Block;

use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\TaskList\TaskListItemMarker;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\Paragraph;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\ChildNodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Util\HtmlElement;
use _PhpScoper5e9ecd738c28\League\CommonMark\Xml\XmlNodeRendererInterface;
final class ListItemRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param ListItem $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : \Stringable
    {
        ListItem::assertInstanceOf($node);
        $contents = $childRenderer->renderNodes($node->children());
        if (\substr($contents, 0, 1) === '<' && !$this->startsTaskListItem($node)) {
            $contents = "\n" . $contents;
        }
        if (\substr($contents, -1, 1) === '>') {
            $contents .= "\n";
        }
        $attrs = $node->data->get('attributes');
        return new HtmlElement('li', $attrs, $contents);
    }
    public function getXmlTagName(Node $node) : string
    {
        return 'item';
    }
    /**
     * {@inheritDoc}
     */
    public function getXmlAttributes(Node $node) : array
    {
        return [];
    }
    private function startsTaskListItem(ListItem $block) : bool
    {
        $firstChild = $block->firstChild();
        return $firstChild instanceof Paragraph && $firstChild->firstChild() instanceof TaskListItemMarker;
    }
}
