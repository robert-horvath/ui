<?php
namespace RHo\UIException;

class MandatoryValueMissingException extends Exception
{

    protected $code = parent::MANDATORY_VALUE_MISSING;

    protected $message = 'Mandatory value missing';
}