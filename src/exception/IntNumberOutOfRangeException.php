<?php
namespace RHo\UIException;

class IntNumberOutOfRangeException extends Exception
{

    protected $code = parent::INT_NUMBER_OUT_OF_RANGE;

    protected $message = 'Integer number out of range. Min=%d, Max=%d';

    public function __construct(int $min, int $max)
    {
        $this->message = sprintf($this->message, $min, $max);
        parent::__construct();
    }
}