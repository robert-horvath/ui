<?php
declare(strict_types = 1);
namespace RHo\UIException;

class IntNumberOutOfRangeException extends Exception
{

    protected $code = parent::INT_NUMBER_OUT_OF_RANGE;

    protected $message = 'Integer number out of range';
}