<?php
declare(strict_types = 1);
namespace RHo\UI;

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
            throw new Exception('Invalid date and time string', Exception::VALIDATION_FAILED);
        }
    }
}