<?php
declare(strict_types = 1);
namespace RHo\UI;

class Exception extends \Exception
{

    public const MANDATORY_VALUE_MISSING = 1;

    public const INVALID_DATA_TYPE = 2;

    public const VALIDATION_FAILED = 3;

    public const REGEXP_ERROR = 4;

    public const INT_TOO_SMALL = 5;

    public const INT_OUT_OF_RANGE = 9;

    public const INT_TOO_BIG = 6;

    public const STR_TOO_SHORT = 7;

    public const STR_TOO_LONG = 8;

    public const ARRAY_ITEM_NOT_FOUND = 10;

    public const NOT_ALLOWED_INT_VALUE = 11;
}