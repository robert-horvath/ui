<?php
declare(strict_types = 1);
namespace RHo\UIException;

class ValidationFailedException extends Exception
{

    protected $code = parent::VALIDATION_FAILED;
}