<?php
declare(strict_types = 1);
namespace RHo\UI;

class AlphaNumToken extends StrAny
{

    private const LENGTH = 64;

    private const PATTERN_FORMAT = '/^[a-z0-9]{%s}$/i';

    /**
     * Constructor
     *
     * @param mixed $value
     *            The token to validate.
     * @param int $length
     *            The length of token.
     */
    protected function __construct($value, int $length = self::LENGTH)
    {
        parent::__construct($value, $length, $length, sprintf(self::PATTERN_FORMAT, $length));
    }
}