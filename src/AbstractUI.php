<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHoException\UI\MandatoryValueMissingException;

abstract class AbstractUI implements UIInterface
{

    /** @var mixed */
    protected $value;

    /**
     * Constructor
     *
     * @param mixed $value
     *            The value to filter.
     */
    protected function __construct($value)
    {
        $this->value = $value;
        $this->filter();
    }

    abstract protected function value();

    abstract protected function checkType(): void;

    abstract protected function checkSyntax(): void;

    private function filter(): void
    {
        $this->checkType();
        $this->checkSyntax();
    }

    /**
     * Filter mandatory user input
     *
     * @param mixed ...$args
     *            Variable-length parameter list to filter the user input.
     *            The first parameter is always the not filtered user input.
     * @throws \RHoException\UI\Exception Filering user input failed
     * @return mixed Filtered user input
     */
    final public static function mandatory(...$args)
    {
        if (NULL === $args[0])
            throw new MandatoryValueMissingException();
        return (new static(...$args))->value();
    }

    /**
     * Filter optional user input
     *
     * @param mixed ...$args
     *            Variable-length parameter list to filter the user input.
     *            The first parameter is always the not filtered user input.
     * @throws \RHoException\UI\Exception Filering user input failed
     * @return mixed|NULL Filtered user input or NULL if user input missing
     */
    final public static function optional(...$args)
    {
        if (NULL === $args[0])
            return NULL;
        return (new static(...$args))->value();
    }
}