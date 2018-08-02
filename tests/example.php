<?php
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $s = $argv[1] ?? '';
    eval("\$x = RHo\\UI\\$s;");
    var_dump($x);
} catch (\RHoException\UI\Exception $e) {
    echo "ERROR\n";
    var_dump($e->getCode(), $e->getMessage());
}