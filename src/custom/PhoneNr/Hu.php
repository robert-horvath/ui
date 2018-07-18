<?php
declare(strict_types = 1);
namespace RHo\UI\PhoneNr;

use RHo\UI\AbstractStringWithRegExp;

class Hu extends AbstractStringWithRegExp
{

    protected const MIN_LENGTH = 13;

    protected const MAX_LENGTH = 17;

    protected const REG_EXP_PATTERN = '/^\+36-(1|[2-9][0-9])-[0-9]{6,10}$/';

    // National Destination Code
    private const MOBILE_NDC = [
        20,
        30,
        31,
        70
    ];

    protected function value(): \stdClass
    {
        $o = new \stdClass();
        $o->value = $this->matches[0];
        $o->isMobile = $this->isMobileNr();
        return $o;
    }

    private function isMobileNr(): bool
    {
        if (in_array($this->matches[1], self::MOBILE_NDC))
            return true;
        return false;
    }
}