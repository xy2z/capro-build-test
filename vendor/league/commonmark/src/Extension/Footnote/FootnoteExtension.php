<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) Rezo Zero / Ambroise Maupate
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote;

use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentBuilderInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Event\DocumentParsedEvent;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ConfigurableExtensionInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Event\AnonymousFootnotesListener;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Event\FixOrphanedFootnotesAndRefsListener;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Event\GatherFootnotesListener;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Event\NumberFootnotesListener;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Node\Footnote;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Node\FootnoteBackref;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Node\FootnoteContainer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Parser\AnonymousFootnoteRefParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Parser\FootnoteRefParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Parser\FootnoteStartParser;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Renderer\FootnoteBackrefRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Renderer\FootnoteContainerRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Renderer\FootnoteRefRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Renderer\FootnoteRenderer;
use _PhpScoper5e9ecd738c28\League\Config\ConfigurationBuilderInterface;
use _PhpScoper5e9ecd738c28\Nette\Schema\Expect;
final class FootnoteExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder) : void
    {
        $builder->addSchema('footnote', Expect::structure(['backref_class' => Expect::string('footnote-backref'), 'backref_symbol' => Expect::string('↩'), 'container_add_hr' => Expect::bool(\true), 'container_class' => Expect::string('footnotes'), 'ref_class' => Expect::string('footnote-ref'), 'ref_id_prefix' => Expect::string('fnref:'), 'footnote_class' => Expect::string('footnote'), 'footnote_id_prefix' => Expect::string('fn:')]));
    }
    public function register(EnvironmentBuilderInterface $environment) : void
    {
        $environment->addBlockStartParser(new FootnoteStartParser(), 51);
        $environment->addInlineParser(new AnonymousFootnoteRefParser(), 35);
        $environment->addInlineParser(new FootnoteRefParser(), 51);
        $environment->addRenderer(FootnoteContainer::class, new FootnoteContainerRenderer());
        $environment->addRenderer(Footnote::class, new FootnoteRenderer());
        $environment->addRenderer(FootnoteRef::class, new FootnoteRefRenderer());
        $environment->addRenderer(FootnoteBackref::class, new FootnoteBackrefRenderer());
        $environment->addEventListener(DocumentParsedEvent::class, [new AnonymousFootnotesListener(), 'onDocumentParsed'], 40);
        $environment->addEventListener(DocumentParsedEvent::class, [new FixOrphanedFootnotesAndRefsListener(), 'onDocumentParsed'], 30);
        $environment->addEventListener(DocumentParsedEvent::class, [new NumberFootnotesListener(), 'onDocumentParsed'], 20);
        $environment->addEventListener(DocumentParsedEvent::class, [new GatherFootnotesListener(), 'onDocumentParsed'], 10);
    }
}
