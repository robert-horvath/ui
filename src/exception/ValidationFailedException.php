<?php
declare(strict_types = 1);
namespace RHoException\UI;

class ValidationFailedException extends Exception
{

    protected $code = parent::VALIDATION_FAILED;
}