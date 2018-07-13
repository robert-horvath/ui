<?php
declare(strict_types = 1);
namespace RHo\UI;

trait StrValueTrait
{

    /**
     * Get the validated value
     *
     * @return string The validated value
     */
    protected function value(): string
    {
        return $this->value;
    }
}