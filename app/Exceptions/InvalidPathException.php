<?php

namespace App\Exceptions;

use Exception;

class InvalidPathException extends Exception
{
    protected $message = 'The given path is invalid!';
}
