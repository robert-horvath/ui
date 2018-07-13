<?php
declare(strict_types = 1);
namespace RHo\UI;

trait RegExpTrait
{

    /** @var string */
    private $pattern;

    /** @var array */
    protected $matches;

    private function validateStrRegExpSyntax(): void
    {
        $ret = @preg_match($this->pattern, $this->value, $this->matches);
        if (1 === $ret)
            return;
        if (0 === $ret)
            throw new Exception('Pattern does not match given subject', Exception::VALIDATION_FAILED);
        else
            throw new Exception('Regular expression error', Exception::REGEXP_ERROR); // check -> preg_last_error()
    }
}