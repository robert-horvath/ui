<?php
declare(strict_types = 1);
namespace RHo\UI;

/**
 *
 * @abstract This class might want to return any value type.
 */
abstract class AbstractStringWithRegExp extends AbstractString
{
    use RegExpTrait;

    protected const REG_EXP_PATTERN = "/^$/";

    protected function __construct($value, ?int $minLen = NULL, ?int $maxLen = NULL, ?string $pattern = NULL)
    {
        $this->pattern = $pattern ?? static::REG_EXP_PATTERN;
        parent::__construct($value, $minLen, $maxLen);
    }

    protected function checkStrSyntax(): void
    {
        $this->checkStrRegExpSyntax();
    }
}