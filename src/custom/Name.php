<?php
declare(strict_types = 1);
namespace RHo\UI;

class Name extends Str
{

    protected const MIN_LENGTH = 2;

    protected const MAX_LENGTH = 30;

    protected const REG_EXP_PATTERN = "/^[ ,.'\-\p{L}]+$/u";
}