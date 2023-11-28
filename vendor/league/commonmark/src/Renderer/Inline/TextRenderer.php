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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\Inline;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Inline\Text;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\ChildNodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Util\Xml;
use _PhpScoper5e9ecd738c28\League\CommonMark\Xml\XmlNodeRendererInterface;
final class TextRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param Text $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : string
    {
        Text::assertInstanceOf($node);
        return Xml::escape($node->getLiteral());
    }
    public function getXmlTagName(Node $node) : string
    {
        return 'text';
    }
    /**
     * {@inheritDoc}
     */
    public function getXmlAttributes(Node $node) : array
    {
        return [];
    }
}
