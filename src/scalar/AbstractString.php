<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHo\UIException\ {
    StringTooShortException,
    StringTooLongException
};

/**
 *
 * @abstract This class might want to return any value type.
 */
abstract class AbstractString extends AbstractFixedSizeString
{

    protected const MIN_LENGTH = 0;

    protected const MAX_LENGTH = 0;

    /** @var int */
    private $minLen;

    /** @var int */
    private $maxLen;

    protected function __construct($value, ?int $minLen = NULL, ?int $maxLen = NULL)
    {
        $this->minLen = $minLen ?? static::MIN_LENGTH;
        $this->maxLen = $maxLen ?? static::MAX_LENGTH;
        parent::__construct($value);
    }

    abstract protected function checkStrSyntax(): void;

    final protected function checkSyntax(): void
    {
        $this->checkStrLen();
        $this->checkStrSyntax();
    }

    private function checkStrLen(): void
    {
        $len = mb_strlen($this->value);
        if ($len < $this->minLen)
            throw new StringTooShortException($this->minLen);
        if ($len > $this->maxLen)
            throw new StringTooLongException($this->maxLen);
    }
}