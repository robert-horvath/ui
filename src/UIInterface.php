<?php
declare(strict_types = 1);
namespace RHo\UI;

interface UIInterface
{

    public static function mandatory(...$args);

    public static function optional(...$args);
}