<?php
declare(strict_types = 1);
namespace RHo\UIException;

class StringTooShortException extends Exception
{

    protected $code = parent::STR_TOO_SHORT;
}