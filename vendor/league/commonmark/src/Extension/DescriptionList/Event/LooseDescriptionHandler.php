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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Event;

use _PhpScoper5e9ecd738c28\League\CommonMark\Event\DocumentParsedEvent;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\Description;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\DescriptionList;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DescriptionList\Node\DescriptionTerm;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Block\Paragraph;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Inline\Newline;
use _PhpScoper5e9ecd738c28\League\CommonMark\Node\NodeIterator;
final class LooseDescriptionHandler
{
    public function __invoke(DocumentParsedEvent $event) : void
    {
        foreach ($event->getDocument()->iterator(NodeIterator::FLAG_BLOCKS_ONLY) as $description) {
            if (!$description instanceof Description) {
                continue;
            }
            // Does this description need to be added to a list?
            if (!$description->parent() instanceof DescriptionList) {
                $list = new DescriptionList();
                // Taking any preceding paragraphs with it
                if (($paragraph = $description->previous()) instanceof Paragraph) {
                    $list->appendChild($paragraph);
                }
                $description->replaceWith($list);
                $list->appendChild($description);
            }
            // Is this description preceded by a paragraph that should really be a term?
            if (!($paragraph = $description->previous()) instanceof Paragraph) {
                continue;
            }
            // Convert the paragraph into one or more terms
            $term = new DescriptionTerm();
            $paragraph->replaceWith($term);
            foreach ($paragraph->children() as $child) {
                if ($child instanceof Newline) {
                    $newTerm = new DescriptionTerm();
                    $term->insertAfter($newTerm);
                    $term = $newTerm;
                    continue;
                }
                $term->appendChild($child);
            }
        }
    }
}
