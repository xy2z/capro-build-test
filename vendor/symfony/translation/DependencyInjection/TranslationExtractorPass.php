<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5e9ecd738c28\Symfony\Component\Translation\DependencyInjection;

use _PhpScoper5e9ecd738c28\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use _PhpScoper5e9ecd738c28\Symfony\Component\DependencyInjection\ContainerBuilder;
use _PhpScoper5e9ecd738c28\Symfony\Component\DependencyInjection\Exception\RuntimeException;
use _PhpScoper5e9ecd738c28\Symfony\Component\DependencyInjection\Reference;
/**
 * Adds tagged translation.extractor services to translation extractor.
 */
class TranslationExtractorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('translation.extractor')) {
            return;
        }
        $definition = $container->getDefinition('translation.extractor');
        foreach ($container->findTaggedServiceIds('translation.extractor', \true) as $id => $attributes) {
            if (!isset($attributes[0]['alias'])) {
                throw new RuntimeException(\sprintf('The alias for the tag "translation.extractor" of service "%s" must be set.', $id));
            }
            $definition->addMethodCall('addExtractor', [$attributes[0]['alias'], new Reference($id)]);
        }
    }
}
