<?php
declare(strict_types = 1);
namespace RHo\UIException;

class IntNumberNotAllowedException extends Exception
{

    protected $code = parent::INT_NUMBER_NOT_ALLOWED;

    protected $message = 'Integer number not allowed';
}