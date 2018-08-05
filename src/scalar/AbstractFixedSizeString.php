<?php
namespace RHo\UI;

use RHo\UIException\InvalidDataTypeException;

/**
 *
 * @abstract This class might want to return any value type.
 */
abstract class AbstractFixedSizeString extends AbstractUI
{

    final protected function checkType(): void
    {
        if (! is_string($this->value))
            throw new InvalidDataTypeException('string');
    }
}