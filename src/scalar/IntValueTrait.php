<?php
declare(strict_types = 1);
namespace RHo\UI;

trait IntValueTrait
{

    /**
     * Get the validated value
     *
     * @return int The validated value
     */
    protected function value(): int
    {
        return $this->value;
    }
}