<?php
namespace RHo\UIException;

class StringTooLongException extends Exception
{

    protected $code = parent::STR_TOO_LONG;

    protected $message = 'String length too long. Max=%d';

    public function __construct(int $max)
    {
        $this->message = sprintf($this->message, $max);
        parent::__construct();
    }
}