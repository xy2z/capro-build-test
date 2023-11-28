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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList;

use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentBuilderInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Event\DocumentParsedEvent;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Event\ConsecutiveDescriptionListMerger;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Event\LooseDescriptionHandler;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\Description;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\DescriptionList;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\DescriptionTerm;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Parser\DescriptionStartParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Renderer\DescriptionListRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Renderer\DescriptionRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Renderer\DescriptionTermRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ExtensionInterface;
final class DescriptionListExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment) : void
    {
        $environment->addBlockStartParser(new DescriptionStartParser());
        $environment->addEventListener(DocumentParsedEvent::class, new LooseDescriptionHandler(), 1001);
        $environment->addEventListener(DocumentParsedEvent::class, new ConsecutiveDescriptionListMerger(), 1000);
        $environment->addRenderer(DescriptionList::class, new DescriptionListRenderer());
        $environment->addRenderer(DescriptionTerm::class, new DescriptionTermRenderer());
        $environment->addRenderer(Description::class, new DescriptionRenderer());
    }
}
