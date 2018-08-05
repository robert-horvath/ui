<?php
namespace RHo\UI;

interface UIInterface
{

    public static function mandatory(...$args);

    public static function optional(...$args);
}