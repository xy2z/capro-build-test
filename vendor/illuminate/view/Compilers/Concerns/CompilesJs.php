<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\View\Compilers\Concerns;

use _PhpScoper5e9ecd738c28\Illuminate\Support\Js;
trait CompilesJs
{
    /**
     * Compile the "@js" directive into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileJs(string $expression)
    {
        return \sprintf("<?php echo \\%s::from(%s)->toHtml() ?>", Js::class, $this->stripParentheses($expression));
    }
}
