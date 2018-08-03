<?php
require_once __DIR__ . '/../vendor/autoload.php';

global $argv;

try {
    $x = 0;
    $s = $argv[1] ?? '';
    eval("\$x = RHo\\UI\\$s;");
    echo "OK\n";
    var_dump($x);
} catch (\RHo\UIException\Exception $e) {
    echo "ERROR\n";
    var_dump($e->getCode(), $e->getMessage());
}