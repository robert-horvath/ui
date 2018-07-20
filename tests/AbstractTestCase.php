<?php
declare(strict_types = 1);
namespace RHoTest\UI;

require_once 'mock-preg-match.php';

use RHo\UIException\Exception;
use PHPUnit\Framework\TestCase;
use ArrayObject;

abstract class AbstractTestCase extends TestCase
{

    /** @var string */
    protected $className;

    /** @var string */
    protected $mockPregMatch;

    /** @var array */
    private $ymlTestData;

    abstract protected function _getTestDataFilePath(): string;

    protected function ymlTestData(string $key)
    {
        if ($this->ymlTestData === NULL)
            $this->ymlTestData = yaml_parse_file($this->_getTestDataFilePath());
        return $this->ymlTestData[$key] ?? NULL;
    }

    protected function setUp()
    {
        if ($this->className === NULL) {
            $this->className = $this->ymlTestData('class');
            $this->mockPregMatch = $this->ymlTestData('mockPregMatch');
        }
    }

    public function validDataProvider()
    {
        return (new ArrayObject($this->ymlTestData('valid')))->getIterator();
    }

    public function invalidDataProvider()
    {
        return (new ArrayObject($this->ymlTestData('invalid')))->getIterator();
    }

    /**
     * @dataProvider validDataProvider
     */
    public function testValidUI($out, ...$args): void
    {
        if (is_array($out)) {
            $out = unserialize($out['object']);
            $this->assertEquals($out, $this->className::mandatory(...$args));
            $this->assertEquals($out, $this->className::optional(...$args));
        } else {
            $this->assertSame($out, $this->className::mandatory(...$args));
            $this->assertSame($out, $this->className::optional(...$args));
        }
    }

    public function testNullUI(): void
    {
        $this->assertNull($this->className::optional(NULL));
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessageRegExp('/^Mandatory value missing$/');
        $this->expectExceptionCode(Exception::MANDATORY_VALUE_MISSING);
        $this->className::mandatory(NULL);
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testMandatoryInvalidUI(array $err, ...$args): void
    {
        $this->prepareInvalidUITest($err, ...$args);
        $this->className::mandatory(...$args);
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testOptionalInvalidUI(array $err, ...$args): void
    {
        $this->prepareInvalidUITest($err, ...$args);
        $this->className::optional(...$args);
    }

    private function prepareInvalidUITest(array $err, ...$args): void
    {
        global $mockPregMatch;
        
        $errCode = constant($err['code']);
        $mockPregMatch = ($errCode === Exception::REGEXP_EXECUTION_ERROR && $this->mockPregMatch);
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessageRegExp($err['txt']);
        $this->expectExceptionCode($errCode);
    }
}