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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Parser;

use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentAwareInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use _PhpScoper5e9ecd738c28\League\CommonMark\Normalizer\TextNormalizerInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Inline\InlineParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Inline\InlineParserMatch;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\InlineParserContext;
use _PhpScoper5e9ecd738c28\League\CommonMark\Reference\Reference;
use _PhpScoper5e9ecd738c28\League\Config\ConfigurationInterface;
final class AnonymousFootnoteRefParser implements InlineParserInterface, EnvironmentAwareInterface
{
    private ConfigurationInterface $config;
    /** @psalm-readonly-allow-private-mutation */
    private TextNormalizerInterface $slugNormalizer;
    public function getMatchDefinition() : InlineParserMatch
    {
        return InlineParserMatch::regex('\\^\\[([^\\]]+)\\]');
    }
    public function parse(InlineParserContext $inlineContext) : bool
    {
        $inlineContext->getCursor()->advanceBy($inlineContext->getFullMatchLength());
        [$label] = $inlineContext->getSubMatches();
        $reference = $this->createReference($label);
        $inlineContext->getContainer()->appendChild(new FootnoteRef($reference, $label));
        return \true;
    }
    private function createReference(string $label) : Reference
    {
        $refLabel = $this->slugNormalizer->normalize($label, ['length' => 20]);
        return new Reference($refLabel, '#' . $this->config->get('footnote/footnote_id_prefix') . $refLabel, $label);
    }
    public function setEnvironment(EnvironmentInterface $environment) : void
    {
        $this->config = $environment->getConfiguration();
        $this->slugNormalizer = $environment->getSlugNormalizer();
    }
}
