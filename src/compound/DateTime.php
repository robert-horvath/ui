<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHoException\UI\ValidationFailedException;

class DateTime extends AbstractString
{

    protected const MIN_LENGTH = 4;

    protected const MAX_LENGTH = 64;

    /**
     * Get the validated value
     *
     * @return \DateTime The validated value
     */
    protected function value(): \DateTime
    {
        return $this->value;
    }

    protected function checkStrSyntax(): void
    {
        try {
            $this->value = new \DateTime($this->value);
        } catch (\Exception $e) {
            throw new ValidationFailedException('Invalid date and time string');
        }
    }
}