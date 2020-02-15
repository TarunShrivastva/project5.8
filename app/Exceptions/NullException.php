<?php

namespace App\Exceptions;

use Exception;

class NullException extends Exception
{
    public function render($exception)
    {
     	// dd($exception);
    }

    public function report()
    {
    	dd('1');
    	\Log::debug('Category Cannot Be Null');
    }
}
