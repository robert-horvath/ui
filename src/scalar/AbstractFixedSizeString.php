<?php
declare(strict_types = 1);
namespace RHo\UI;

/**
 *
 * @abstract This class might want to return any value type.
 */
abstract class AbstractFixedSizeString extends AbstractUI
{

    final protected function validateType(): void
    {
        if (! is_string($this->value))
            throw new Exception('<string> data type required', Exception::INVALID_DATA_TYPE);
    }
}