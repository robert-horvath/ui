<?php
declare(strict_types = 1);
namespace RHo\UI;

class CountryCode extends Str
{

    protected const MIN_LENGTH = 2;

    protected const MAX_LENGTH = 2;

    protected const REG_EXP_PATTERN = '/^[a-z]{2}$/i';

    protected function value(): string
    {
        return strtoupper($this->value);
    }
}