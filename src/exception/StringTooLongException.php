<?php
declare(strict_types = 1);
namespace RHoException\UI;

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