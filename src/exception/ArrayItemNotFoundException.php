<?php
declare(strict_types = 1);
namespace RHoException\UI;

class ArrayItemNotFoundException extends Exception
{

    protected $code = parent::ARRAY_ITEM_NOT_FOUND;

    protected $message = 'Array item not found';
}