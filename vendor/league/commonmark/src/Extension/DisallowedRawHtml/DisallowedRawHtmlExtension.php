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
namespace _PhpScoper5e9ecd738c28\League\CommonMark\Extension\DisallowedRawHtml;

use _PhpScoper5e9ecd738c28\League\CommonMark\Environment\EnvironmentBuilderInterface;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Node\Inline\HtmlInline;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Renderer\Block\HtmlBlockRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\CommonMark\Renderer\Inline\HtmlInlineRenderer;
use _PhpScoper5e9ecd738c28\League\CommonMark\Extension\ConfigurableExtensionInterface;
use _PhpScoper5e9ecd738c28\League\Config\ConfigurationBuilderInterface;
use _PhpScoper5e9ecd738c28\Nette\Schema\Expect;
final class DisallowedRawHtmlExtension implements ConfigurableExtensionInterface
{
    private const DEFAULT_DISALLOWED_TAGS = ['title', 'textarea', 'style', 'xmp', 'iframe', 'noembed', 'noframes', 'script', 'plaintext'];
    public function configureSchema(ConfigurationBuilderInterface $builder) : void
    {
        $builder->addSchema('disallowed_raw_html', Expect::structure(['disallowed_tags' => Expect::listOf('string')->default(self::DEFAULT_DISALLOWED_TAGS)->mergeDefaults(\false)]));
    }
    public function register(EnvironmentBuilderInterface $environment) : void
    {
        $environment->addRenderer(HtmlBlock::class, new DisallowedRawHtmlRenderer(new HtmlBlockRenderer()), 50);
        $environment->addRenderer(HtmlInline::class, new DisallowedRawHtmlRenderer(new HtmlInlineRenderer()), 50);
    }
}
