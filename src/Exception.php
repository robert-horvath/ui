<?php
declare(strict_types = 1);
namespace RHo\UI;

class Exception extends \Exception
{

    public const MANDATORY_VALUE_MISSING = 1;

    public const VALIDATION_FAILED = 2;

    public const REGEXP_ERROR = 3;

    public const INT_TOO_SMALL = 4;

    public const INT_TOO_BIG = 5;

    public const STR_TOO_SHORT = 6;

    public const STR_TOO_LONG = 7;

    public const INVALID_DATA_TYPE = 8;

    public const INT_OUT_OF_RANGE = 9;

    public const ARRAY_ITEM_NOT_FOUND = 10;

    public const INT_NOT_ALLOWED = 11;
}