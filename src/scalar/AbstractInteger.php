<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHo\UIException\ {
    InvalidDataTypeException,
    IntNumberTooSmallException,
    IntNumberTooLargeException,
    IntNumberOutOfRangeException
};

/**
 *
 * @abstract This class might want to return any value type.
 */
abstract class AbstractInteger extends AbstractUI
{
    
    use RegExpTrait;

    protected const MIN_INT = 0;

    protected const MAX_INT = 0;

    // −9,223,372,036,854,775,808 to 9,223,372,036,854,775,807
    private const REG_EXP_PATTERN = '/^-?[0-9]{1,19}$/';

    /** @var int */
    private $min;

    /** @var int */
    private $max;

    final protected function __construct($value, ?int $min = NULL, ?int $max = NULL)
    {
        $this->pattern = self::REG_EXP_PATTERN;
        $this->min = $min ?? static::MIN_INT;
        $this->max = $max ?? static::MAX_INT;
        parent::__construct($value);
    }

    final protected function checkType(): void
    {
        if (! is_string($this->value) && ! is_int($this->value))
            throw new InvalidDataTypeException('int|string');
    }

    protected function checkSyntax(): void
    {
        if (is_string($this->value))
            $this->convertStrToInt();
        $this->checkIntRange();
    }

    private function convertStrToInt(): void
    {
        $this->checkStrRegExpSyntax();
        $i = intval($this->value); // returns either PHP_INT_MIN or PHP_INT_MAX when overflows
        if (strval($i) !== $this->value && ($i === PHP_INT_MIN || $i === PHP_INT_MAX))
            throw new IntNumberOutOfRangeException(PHP_INT_MIN, PHP_INT_MAX);
        $this->value = $i;
    }

    private function checkIntRange(): void
    {
        if ($this->value > $this->max)
            throw new IntNumberTooLargeException($this->max);
        if ($this->value < $this->min)
            throw new IntNumberTooSmallException($this->min);
    }
}