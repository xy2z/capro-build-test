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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Mention;

use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Mention\Generator\CallbackGenerator;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Mention\Generator\MentionGeneratorInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Mention\Generator\StringTemplateLinkGenerator;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Inline\InlineParserInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\Inline\InlineParserMatch;
use _PhpScoper5e9ecd738c28\League\CommonMark\Parser\InlineParserContext;
final class MentionParser implements InlineParserInterface
{
    /** @psalm-readonly */
    private string $name;
    /** @psalm-readonly */
    private string $prefix;
    /** @psalm-readonly */
    private string $identifierPattern;
    /** @psalm-readonly */
    private MentionGeneratorInterface $mentionGenerator;
    public function __construct(string $name, string $prefix, string $identifierPattern, MentionGeneratorInterface $mentionGenerator)
    {
        $this->name = $name;
        $this->prefix = $prefix;
        $this->identifierPattern = $identifierPattern;
        $this->mentionGenerator = $mentionGenerator;
    }
    public function getMatchDefinition() : InlineParserMatch
    {
        return InlineParserMatch::join(InlineParserMatch::string($this->prefix), InlineParserMatch::regex($this->identifierPattern));
    }
    public function parse(InlineParserContext $inlineContext) : bool
    {
        $cursor = $inlineContext->getCursor();
        // The prefix must not have any other characters immediately prior
        $previousChar = $cursor->peek(-1);
        if ($previousChar !== null && \preg_match('/\\w/', $previousChar)) {
            // peek() doesn't modify the cursor, so no need to restore state first
            return \false;
        }
        [$prefix, $identifier] = $inlineContext->getSubMatches();
        $mention = $this->mentionGenerator->generateMention(new Mention($this->name, $prefix, $identifier));
        if ($mention === null) {
            return \false;
        }
        $cursor->advanceBy($inlineContext->getFullMatchLength());
        $inlineContext->getContainer()->appendChild($mention);
        return \true;
    }
    public static function createWithStringTemplate(string $name, string $prefix, string $mentionRegex, string $urlTemplate) : MentionParser
    {
        return new self($name, $prefix, $mentionRegex, new StringTemplateLinkGenerator($urlTemplate));
    }
    public static function createWithCallback(string $name, string $prefix, string $mentionRegex, callable $callback) : MentionParser
    {
        return new self($name, $prefix, $mentionRegex, new CallbackGenerator($callback));
    }
}
