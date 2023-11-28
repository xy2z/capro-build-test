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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Environment;

use _PhpScoper5e9ecd738c28\League\CommonMark\Delimiter\Processor\DelimiterProcessorCollection;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ExtensionInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Normalizer\TextNormalizerInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockStartParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Inline\InlineParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\Config\ConfigurationProviderInterface;
use _PhpScoper5e9ecd738c28\Psr\EventDispatcher\EventDispatcherInterface;
interface EnvironmentInterface extends ConfigurationProviderInterface, EventDispatcherInterface
{
    /**
     * Get all registered extensions
     *
     * @return ExtensionInterface[]
     */
    public function getExtensions() : iterable;
    /**
     * @return iterable<BlockStartParserInterface>
     */
    public function getBlockStartParsers() : iterable;
    /**
     * @return iterable<InlineParserInterface>
     */
    public function getInlineParsers() : iterable;
    public function getDelimiterProcessors() : DelimiterProcessorCollection;
    /**
     * @psalm-param class-string<Node> $nodeClass
     *
     * @return iterable<NodeRendererInterface>
     */
    public function getRenderersForClass(string $nodeClass) : iterable;
    public function getSlugNormalizer() : TextNormalizerInterface;
}
