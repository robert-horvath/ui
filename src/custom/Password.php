<?php
declare(strict_types = 1);
namespace RHo\UI;

class Password extends StrAny
{

    protected const MIN_LENGTH = 5;

    protected const MAX_LENGTH = 64;

    protected const REG_EXP_PATTERN = '/^(?=.*\d)(?=.*[a-záéíöóőüúű])(?=.*[A-ZÁÉÍÖÓŐÜÚŰ])(?!.*\s).*$/';
}