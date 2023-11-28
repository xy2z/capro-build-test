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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\FrontMatter;

use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentBuilderInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Event\DocumentPreParsedEvent;
use _PhpScoper5e9ecd738c28\League\CommonMark\Event\DocumentRenderedEvent;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ExtensionInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\FrontMatter\Data\FrontMatterDataParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\FrontMatter\Listener\FrontMatterPostRenderListener;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\FrontMatter\Listener\FrontMatterPreParser;
final class FrontMatterExtension implements ExtensionInterface
{
    /** @psalm-readonly */
    private FrontMatterParserInterface $frontMatterParser;
    public function __construct(?FrontMatterDataParserInterface $dataParser = null)
    {
        $this->frontMatterParser = new FrontMatterParser($dataParser ?? LibYamlFrontMatterParser::capable() ?? new SymfonyYamlFrontMatterParser());
    }
    public function getFrontMatterParser() : FrontMatterParserInterface
    {
        return $this->frontMatterParser;
    }
    public function register(EnvironmentBuilderInterface $environment) : void
    {
        $environment->addEventListener(DocumentPreParsedEvent::class, new FrontMatterPreParser($this->frontMatterParser));
        $environment->addEventListener(DocumentRenderedEvent::class, new FrontMatterPostRenderListener(), -500);
    }
}
