<?php

namespace App\Exceptions;

use Exception;

class NullException extends Exception
{
    public function render($request, Exception $exception)
    {
    	dd('1', $exception);
    }

    public function report(Exception $exception)
    {
    	dd('2', $exception);
    }
}
