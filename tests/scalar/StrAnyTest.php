<?php
declare(strict_types = 1);
namespace RHoTest\UI;

use RHo\UI\Exception;

class StrAnyTest extends AbstractScalarTestCase
{

    /** @var bool */
    private $checkLastPregError;

    protected const TEST_FILE = 'string-any.yml';

    public function setUp()
    {
        parent::setUp();
        $this->checkLastPregError = FALSE;
    }

    protected function tearDown()
    {
        if ($this->checkLastPregError)
            $this->assertEquals(PREG_BACKTRACK_LIMIT_ERROR, preg_last_error());
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testMandatoryInvalidUI(array $err, ...$args): void
    {
        if (constant($err['code']) === Exception::REGEXP_ERROR)
            $this->checkLastPregError = TRUE;
        parent::testMandatoryInvalidUI($err, ...$args);
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testOptionalInvalidUI(array $err, ...$args): void
    {
        if ($err['code'] === Exception::REGEXP_ERROR)
            $this->checkLastPregError = TRUE;
        parent::testOptionalInvalidUI($err, ...$args);
    }
}