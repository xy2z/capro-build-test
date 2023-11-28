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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Footnote\Node;

use _PhpScoper5e9ecd738c28\League\CommonMark\Node\Inline\AbstractInline;
use _PhpScoper5e9ecd738c28\League\CommonMark\Reference\ReferenceInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Reference\ReferenceableInterface;
/**
 * Link from the footnote on the bottom of the document back to the reference
 */
final class FootnoteBackref extends AbstractInline implements ReferenceableInterface
{
    /** @psalm-readonly */
    private ReferenceInterface $reference;
    public function __construct(ReferenceInterface $reference)
    {
        parent::__construct();
        $this->reference = $reference;
    }
    public function getReference() : ReferenceInterface
    {
        return $this->reference;
    }
}
