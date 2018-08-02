<?php
declare(strict_types = 1);
namespace RHoException\UI;

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