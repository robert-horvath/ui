<?php
declare(strict_types = 1);
namespace RHo\UI;

class SemVer extends Str
{

    protected const MIN_LENGTH = 5;

    protected const MAX_LENGTH = 16;

    protected const REG_EXP_PATTERN = "/^[0-9]+\.[0-9]+\.[0-9]+$/";
}