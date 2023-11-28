<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\Symfony\Component\Translation\Loader;

use _PhpScoper5e9ecd738c28\Symfony\Component\Translation\Exception\InvalidResourceException;
use _PhpScoper5e9ecd738c28\Symfony\Component\Translation\Exception\NotFoundResourceException;
use _PhpScoper5e9ecd738c28\Symfony\Component\Translation\MessageCatalogue;
/**
 * LoaderInterface is the interface implemented by all translation loaders.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface LoaderInterface
{
    /**
     * Loads a locale.
     *
     * @throws NotFoundResourceException when the resource cannot be found
     * @throws InvalidResourceException  when the resource cannot be loaded
     */
    public function load(mixed $resource, string $locale, string $domain = 'messages') : MessageCatalogue;
}
