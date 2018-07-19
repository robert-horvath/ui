<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHo\UIException\Exception;

/**
 *
 * @abstract This class might want to return any value type.
 */
abstract class AbstractFixedSizeString extends AbstractUI
{

    final protected function checkType(): void
    {
        if (! is_string($this->value))
            throw new Exception('<string> data type required', Exception::INVALID_DATA_TYPE);
    }
}