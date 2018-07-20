<?php
declare(strict_types = 1);
namespace RHo\UIException;

class StringTooLongException extends Exception
{

    protected $code = parent::STR_TOO_LONG;
}