<?php
namespace RHo\UIException;

class ValidationFailedException extends Exception
{

    protected $code = parent::VALIDATION_FAILED;
}