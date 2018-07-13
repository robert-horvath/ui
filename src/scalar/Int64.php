<?php
declare(strict_types = 1);
namespace RHo\UI;

final class Int64 extends Integer
{

    protected const MIN_INT = PHP_INT_MIN;

    protected const MAX_INT = PHP_INT_MAX;
}