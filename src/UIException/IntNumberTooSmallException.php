<?php
declare(strict_types = 1);
namespace RHo\UIException;

class IntNumberTooSmallException extends Exception
{

    protected $code = parent::INT_NUMBER_TOO_SMALL;

    protected $message = 'Integer number too small. Min=%d';

    public function __construct(int $min)
    {
        $this->message = sprintf($this->message, $min);
        parent::__construct();
    }
}