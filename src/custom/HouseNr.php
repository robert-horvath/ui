<?php
declare(strict_types = 1);
namespace RHo\UI;

class HouseNr extends StrAny
{

    protected const MIN_LENGTH = 1;

    protected const MAX_LENGTH = 10;

    protected const REG_EXP_PATTERN = '/^[0-9]+[0-9 a-z\.\-\/]*$/i';
}