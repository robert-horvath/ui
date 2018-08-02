<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHoException\UI\ValidationFailedException;

class Email extends AbstractString
{
    use StrValueTrait;

    protected const MIN_LENGTH = 5;

    protected const MAX_LENGTH = 254;

    protected function checkStrSyntax(): void
    {
        if (false === filter_var($this->value, FILTER_VALIDATE_EMAIL))
            // filter_var() doesn't set error_get_last (), so return const text
            throw new ValidationFailedException('Invalid e-mail address');
    }
}
 