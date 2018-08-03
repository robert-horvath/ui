<?php
declare(strict_types = 1);
namespace RHo\UITest;

abstract class AbstractCustomTestCase extends AbstractTestCase
{

    protected function _getTestDataFilePath(): string
    {
        return __DIR__ . '/data/' . static::TEST_FILE;
    }
}