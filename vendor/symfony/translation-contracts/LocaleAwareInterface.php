<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\Symfony\Contracts\Translation;

interface LocaleAwareInterface
{
    /**
     * Sets the current locale.
     *
     * @throws \InvalidArgumentException If the locale contains invalid characters
     */
    public function setLocale(string $locale);
    /**
     * Returns the current locale.
     */
    public function getLocale() : string;
}
