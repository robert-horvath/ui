<?php
declare(strict_types = 1);
namespace RHo\UIException;

class IntNumberTooLargeException extends Exception
{

    protected $code = parent::INT_NUMBER_TOO_LARGE;

    protected $message = 'Integer number too large';
}