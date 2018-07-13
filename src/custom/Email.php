<?php
declare(strict_types = 1);
namespace RHo\UI;

class Email extends AbstractString
{
    use StrValueTrait;

    protected const MIN_LENGTH = 5;

    protected const MAX_LENGTH = 254;

    protected function validateStrSyntax(): void
    {
        if (false === filter_var($this->value, FILTER_VALIDATE_EMAIL))
            // filter_var() doesn't set error_get_last (), so return const text
            throw new Exception('Invalid e-mail address', Exception::VALIDATION_FAILED);
    }
}
 