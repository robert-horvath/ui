<?php
namespace RHo\UIException;

class InvalidDataTypeException extends Exception
{

    protected $code = parent::INVALID_DATA_TYPE;

    protected $message = '<%s> data type required';

    public function __construct(string $type)
    {
        $this->message = sprintf($this->message, $type);
        parent::__construct();
    }
}