<?php
namespace RHo\UIException;

class IntNumberNotAllowedException extends Exception
{

    protected $code = parent::INT_NUMBER_NOT_ALLOWED;

    protected $message = 'Integer number not allowed';
}