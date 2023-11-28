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

use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Node\Block\BlockQuote;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\ChildNodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Util\HtmlElement;
use _PhpScoper5e9ecd738c28\League\CommonMark\Xml\XmlNodeRendererInterface;
final class BlockQuoteRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param BlockQuote $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : \Stringable
    {
        BlockQuote::assertInstanceOf($node);
        $attrs = $node->data->get('attributes');
        $filling = $childRenderer->renderNodes($node->children());
        $innerSeparator = $childRenderer->getInnerSeparator();
        if ($filling === '') {
            return new HtmlElement('blockquote', $attrs, $innerSeparator);
        }
        return new HtmlElement('blockquote', $attrs, $innerSeparator . $filling . $innerSeparator);
    }
    public function getXmlTagName(Node $node) : string
    {
        return 'block_quote';
    }
    /**
     * @param BlockQuote $node
     *
     * @return array<string, scalar>
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function getXmlAttributes(Node $node) : array
    {
        return [];
    }
}
