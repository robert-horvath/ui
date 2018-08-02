<?php
declare(strict_types = 1);
namespace RHoException\UI;

class Exception extends \Exception
{

    public const MANDATORY_VALUE_MISSING = 100;

    public const INVALID_DATA_TYPE = 101;

    public const VALIDATION_FAILED = 102;

    public const REGEXP_EXECUTION_ERROR = 103;

    public const INT_NUMBER_TOO_SMALL = 200;

    public const INT_NUMBER_TOO_LARGE = 201;

    public const INT_NUMBER_OUT_OF_RANGE = 202;

    public const INT_NUMBER_NOT_ALLOWED = 203;

    public const STR_TOO_SHORT = 300;

    public const STR_TOO_LONG = 301;

    public const ARRAY_ITEM_NOT_FOUND = 400;
}