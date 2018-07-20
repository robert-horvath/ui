<?php
declare(strict_types = 1);
namespace RHo\UI;

class Authorization extends AbstractStringWithRegExp
{

    protected const MIN_LENGTH = 8;

    protected const MAX_LENGTH = 150;

    private const TOKEN_LEN = 64;

    protected const REG_EXP_PATTERN = "/^Bearer[ ]+([^~]+)~(.+)$/";

    private const DATETIME_FORMAT = "D.d-M-Y_H/i/s.u_T";

    /** @var string */
    private $alphaNumToken;

    /** @var \DateTime */
    private $dateTime;

    /**
     * Validate authorization
     *
     * @param string $value
     *            Not validated authorization
     * @throws \RHo\UIException\Exception Validation failed
     * @return Authorization Validated authorization
     */
    final protected function checkStrSyntax(): void
    {
        BearerAuthScheme::mandatory($this->value, self::MAX_LENGTH);
        parent::checkStrSyntax();
        
        $this->alphaNumToken = AlphaNumToken::mandatory($this->matches[1], self::TOKEN_LEN);
        $this->dateTime = DateTimeWithFormat::mandatory($this->matches[2], self::DATETIME_FORMAT);
    }

    protected function value(): \stdClass
    {
        $o = new \stdClass();
        $o->dateTime = $this->dateTime;
        $o->token = $this->alphaNumToken;
        return $o;
    }
}