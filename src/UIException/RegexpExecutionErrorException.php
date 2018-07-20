<?php
declare(strict_types = 1);
namespace RHo\UIException;

class RegexpExecutionErrorException extends Exception
{

    protected $code = parent::REGEXP_EXECUTION_ERROR;

    protected $message = 'Regular expression error';

    public function pregLastError(): int
    {
        return preg_last_error();
    }
}