<?php
namespace RHo\UI;

use RHo\UIException\ {
    ValidationFailedException,
    RegexpExecutionErrorException
};

trait RegExpTrait
{

    /** @var string */
    private $pattern;

    /** @var array */
    protected $matches;

    private function checkStrRegExpSyntax(): void
    {
        $ret = @preg_match($this->pattern, $this->value, $this->matches);
        if (1 === $ret)
            return;
        if (0 === $ret)
            throw new ValidationFailedException('Pattern does not match given subject');
        else
            throw new RegexpExecutionErrorException(preg_last_error());
    }
}