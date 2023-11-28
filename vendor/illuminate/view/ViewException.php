<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\View;

use ErrorException;
use _PhpScoper5e9ecd738c28\Illuminate\Container\Container;
use _PhpScoper5e9ecd738c28\Illuminate\Support\Reflector;
class ViewException extends ErrorException
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        $exception = $this->getPrevious();
        if (Reflector::isCallable($reportCallable = [$exception, 'report'])) {
            return Container::getInstance()->call($reportCallable);
        }
        return \false;
    }
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $exception = $this->getPrevious();
        if ($exception && \method_exists($exception, 'render')) {
            return $exception->render($request);
        }
    }
}
