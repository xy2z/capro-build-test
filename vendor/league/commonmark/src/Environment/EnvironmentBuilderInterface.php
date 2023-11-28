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

use _PhpScoper5e9ecd738c28\League\CommonMark\Delimiter\Processor\DelimiterProcessorInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Exception\AlreadyInitializedException;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ExtensionInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Node;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Block\BlockStartParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Inline\InlineParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Renderer\NodeRendererInterface;
use _PhpScoper5e9ecd738c28\League\Config\ConfigurationProviderInterface;
/**
 * Interface for building the Environment with any extensions, parsers, listeners, etc. that it may need
 */
interface EnvironmentBuilderInterface extends ConfigurationProviderInterface
{
    /**
     * Registers the given extension with the Environment
     *
     * @throws AlreadyInitializedException if the Environment has already been initialized
     */
    public function addExtension(ExtensionInterface $extension) : EnvironmentBuilderInterface;
    /**
     * Registers the given block start parser with the Environment
     *
     * @param BlockStartParserInterface $parser   Block parser instance
     * @param int                       $priority Priority (a higher number will be executed earlier)
     *
     * @return $this
     *
     * @throws AlreadyInitializedException if the Environment has already been initialized
     */
    public function addBlockStartParser(BlockStartParserInterface $parser, int $priority = 0) : EnvironmentBuilderInterface;
    /**
     * Registers the given inline parser with the Environment
     *
     * @param InlineParserInterface $parser   Inline parser instance
     * @param int                   $priority Priority (a higher number will be executed earlier)
     *
     * @return $this
     *
     * @throws AlreadyInitializedException if the Environment has already been initialized
     */
    public function addInlineParser(InlineParserInterface $parser, int $priority = 0) : EnvironmentBuilderInterface;
    /**
     * Registers the given delimiter processor with the Environment
     *
     * @param DelimiterProcessorInterface $processor Delimiter processors instance
     *
     * @throws AlreadyInitializedException if the Environment has already been initialized
     */
    public function addDelimiterProcessor(DelimiterProcessorInterface $processor) : EnvironmentBuilderInterface;
    /**
     * Registers the given node renderer with the Environment
     *
     * @param string                $nodeClass The fully-qualified node element class name the renderer below should handle
     * @param NodeRendererInterface $renderer  The renderer responsible for rendering the type of element given above
     * @param int                   $priority  Priority (a higher number will be executed earlier)
     *
     * @psalm-param class-string<Node> $nodeClass
     *
     * @return $this
     *
     * @throws AlreadyInitializedException if the Environment has already been initialized
     */
    public function addRenderer(string $nodeClass, NodeRendererInterface $renderer, int $priority = 0) : EnvironmentBuilderInterface;
    /**
     * Registers the given event listener
     *
     * @param class-string $eventClass Fully-qualified class name of the event this listener should respond to
     * @param callable     $listener   Listener to be executed
     * @param int          $priority   Priority (a higher number will be executed earlier)
     *
     * @return $this
     *
     * @throws AlreadyInitializedException if the Environment has already been initialized
     */
    public function addEventListener(string $eventClass, callable $listener, int $priority = 0) : EnvironmentBuilderInterface;
}
