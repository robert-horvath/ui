<?php
namespace RHo\UI;

class Password extends Str
{

    protected const MIN_LENGTH = 5;

    protected const MAX_LENGTH = 64;

    protected const REG_EXP_PATTERN = '/^(?=.*\d)(?=.*[a-záéíöóőüúű])(?=.*[A-ZÁÉÍÖÓŐÜÚŰ])(?!.*\s).*$/';
}