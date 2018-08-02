<?php
declare(strict_types = 1);
namespace RHoException\UI;

class StringTooShortException extends Exception
{

    protected $code = parent::STR_TOO_SHORT;

    protected $message = 'String length too short. Min=%d';

    public function __construct(int $min)
    {
        $this->message = sprintf($this->message, $min);
        parent::__construct();
    }
}