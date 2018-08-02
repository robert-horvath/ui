<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHoException\UI\ValidationFailedException;

class DateTimeWithFormat extends DateTime
{

    /** @var string */
    private $format;

    protected function __construct($value, string $format)
    {
        $this->format = $format;
        parent::__construct($value);
    }

    protected function checkStrSyntax(): void
    {
        if (false === ($this->value = \DateTime::createFromFormat($this->format, $this->value)))
            throw new ValidationFailedException('Invalid free formatted date and time string');
    }
}