<?php
declare(strict_types = 1);
namespace RHo\UI;

/**
 * RFC 6750: The OAuth 2.0 Authorization Framework: Bearer Token Usage
 *
 * b64token = 1*( ALPHA / DIGIT / "-" / "." / "_" / "~" / "+" / "/" ) *"="
 * credentials = "Bearer" 1*SP b64token
 */
class BearerAuthScheme extends Str
{

    protected const MIN_LENGTH = 8;

    private const PATTERN = '/^Bearer[ ]+[a-zA-Z0-9-._~+\/]+=*$/';

    protected function __construct($value, int $maxLength)
    {
        parent::__construct($value, self::MIN_LENGTH, $maxLength, self::PATTERN);
    }
}