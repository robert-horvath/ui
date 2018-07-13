<?php
declare(strict_types = 1);
namespace RHo\UI;

function preg_match(string $pattern, string $subject, ?array &$matches)
{
    global $mockPregMatch;
    
    return $mockPregMatch ? false : \preg_match($pattern, $subject, $matches);
}