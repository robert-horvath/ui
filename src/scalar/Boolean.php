<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHo\UIException\ {
    ValidationFailedException,
    InvalidDataTypeException
};

final class Boolean extends AbstractUI
{

    /**
     * Get the validated value
     *
     * @return bool The validated value
     */
    protected function value(): bool
    {
        return $this->value;
    }

    protected function checkType(): void
    {
        if (! is_string($this->value) && ! is_bool($this->value))
            throw new InvalidDataTypeException('char[t,f,y,n]|bool');
    }

    protected function checkSyntax(): void
    {
        if (is_string($this->value))
            $this->convertStrToBool();
    }

    private function convertStrToBool(): void
    {
        if ($this->value === 't' || $this->value === 'y')
            $this->value = true;
        else if ($this->value === 'f' || $this->value === 'n')
            $this->value = false;
        else
            throw new ValidationFailedException('Invalid boolean expression');
    }
}