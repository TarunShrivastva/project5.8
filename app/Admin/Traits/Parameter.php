<?php

namespace App\Admin\Traits;


/**
 * @deprecated
 */
trait Parameter
{
    /**
     * @param \Closure $callback
     *
     * @return Grid
     */
    public function getParameters()
    {
        return $parameters = request()->route()->parameters();
    }
}