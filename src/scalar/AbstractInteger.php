<?php
declare(strict_types = 1);
namespace RHo\UI;

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
            throw new Exception('<string|int> data type required', Exception::INVALID_DATA_TYPE);
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
            throw new Exception('Out of 64 bit range', Exception::INT_OUT_OF_RANGE);
        $this->value = $i;
    }

    private function checkIntRange(): void
    {
        if ($this->value > $this->max)
            throw new Exception('Integer too big', Exception::INT_TOO_BIG);
        if ($this->value < $this->min)
            throw new Exception('Integer too small', Exception::INT_TOO_SMALL);
    }
}