<?php
namespace RHo\UI;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $byte = UInt8::mandatory(NULL);
    var_dump($byte);
} catch (\RHo\UIException\Exception $e) {
    echo "ERROR\n";
    var_dump($e->getCode(), $e->getMessage());
}
