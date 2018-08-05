<?php
namespace RHo\UIException;

class RegexpExecutionErrorException extends Exception
{

    protected $code = parent::REGEXP_EXECUTION_ERROR;

    protected $message = 'Regular expression error. Err=%d';

    public function __construct(int $pregLastError)
    {
        $this->message = sprintf($this->message, $pregLastError);
        parent::__construct();
    }
}