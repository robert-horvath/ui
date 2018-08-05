<?php
namespace RHo\UIException;

class IntNumberTooLargeException extends Exception
{

    protected $code = parent::INT_NUMBER_TOO_LARGE;

    protected $message = 'Integer number too large. Max=%d';

    public function __construct(int $max)
    {
        $this->message = sprintf($this->message, $max);
        parent::__construct();
    }
}