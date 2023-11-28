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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\Embed;

use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentBuilderInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Event\DocumentParsedEvent;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ConfigurableExtensionInterface;
use _PhpScoper5e9ecd738c28\League\Config\ConfigurationBuilderInterface;
use _PhpScoper5e9ecd738c28\Nette\Schema\Expect;
final class EmbedExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder) : void
    {
        $builder->addSchema('embed', Expect::structure(['adapter' => Expect::type(EmbedAdapterInterface::class), 'allowed_domains' => Expect::arrayOf('string')->default([]), 'fallback' => Expect::anyOf('link', 'remove')->default('link')]));
    }
    public function register(EnvironmentBuilderInterface $environment) : void
    {
        $adapter = $environment->getConfiguration()->get('embed.adapter');
        \assert($adapter instanceof EmbedAdapterInterface);
        $allowedDomains = $environment->getConfiguration()->get('embed.allowed_domains');
        if ($allowedDomains !== []) {
            $adapter = new DomainFilteringAdapter($adapter, $allowedDomains);
        }
        $environment->addBlockStartParser(new EmbedStartParser(), 300)->addEventListener(DocumentParsedEvent::class, new EmbedProcessor($adapter, $environment->getConfiguration()->get('embed.fallback')), 1010)->addRenderer(Embed::class, new EmbedRenderer());
    }
}
