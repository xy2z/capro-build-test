<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\Symfony\Component\Translation\Reader;

use _PhpScoper5e9ecd738c28\Symfony\Component\Translation\MessageCatalogue;
/**
 * TranslationReader reads translation messages from translation files.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
interface TranslationReaderInterface
{
    /**
     * Reads translation messages from a directory to the catalogue.
     */
    public function read(string $directory, MessageCatalogue $catalogue);
}
