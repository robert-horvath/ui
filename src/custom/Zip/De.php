<?php
declare(strict_types = 1);
namespace RHo\UI\Zip;

use RHo\UI\StrAny;

class De extends StrAny
{

    protected const MIN_LENGTH = 5;

    protected const MAX_LENGTH = 5;

    protected const REG_EXP_PATTERN = '/^[1-9][0-9]{' . (self::MIN_LENGTH - 1) . '}$/';
}