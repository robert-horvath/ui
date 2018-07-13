<?php
declare(strict_types = 1);
namespace RHo\UI;

final class Int16 extends Integer
{

    protected const MIN_INT = - 32768;

    protected const MAX_INT = 32767;
}