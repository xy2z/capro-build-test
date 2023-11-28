<?php

declare (strict_types=1);
namespace _PhpScoper5e9ecd738c28\Doctrine\Inflector\Rules\Portuguese;

use _PhpScoper5e9ecd738c28\Doctrine\Inflector\GenericLanguageInflectorFactory;
use _PhpScoper5e9ecd738c28\Doctrine\Inflector\Rules\Ruleset;
final class InflectorFactory extends GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : Ruleset
    {
        return Rules::getSingularRuleset();
    }
    protected function getPluralRuleset() : Ruleset
    {
        return Rules::getPluralRuleset();
    }
}
