<?php
declare(strict_types = 1);
namespace RHo\UI;

abstract class AbstractUI implements UIInterface
{

    /** @var mixed */
    protected $value;

    /**
     * Constructor
     *
     * @param mixed $value
     *            The value to validate.
     */
    protected function __construct($value)
    {
        $this->value = $value;
        $this->validate();
    }

    abstract protected function value();

    abstract protected function validateType(): void;

    abstract protected function validateSyntax(): void;

    final protected function validate(): void
    {
        $this->validateType();
        $this->validateSyntax();
    }

    /**
     * Validate mandatory user input
     *
     * @param mixed ...$args
     *            Variable-length argument list to validate the user input.
     *            Depends on concreate class.
     * @throws \RHo\UI\Exception Validation failed
     * @return mixed Validated user input
     */
    final public static function mandatory(...$args)
    {
        if (NULL === $args[0])
            throw new Exception('Mandatory value missing', Exception::MANDATORY_VALUE_MISSING);
        return (new static(...$args))->value();
    }

    /**
     * Validate optional user input
     *
     * @param mixed ...$args
     *            Variable-length argument list to validate the user input.
     *            Depends on concreate class.
     * @throws \RHo\UI\Exception Validation failed
     * @return mixed|NULL Validated user input or NULL if user input missing
     */
    final public static function optional(...$args)
    {
        if (NULL === $args[0])
            return NULL;
        return (new static(...$args))->value();
    }
}