<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\View\Compilers\Concerns;

trait CompilesClasses
{
    /**
     * Compile the conditional class statement into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileClass($expression)
    {
        $expression = \is_null($expression) ? '([])' : $expression;
        return "class=\"<?php echo \\Illuminate\\Support\\Arr::toCssClasses{$expression} ?>\"";
    }
}
