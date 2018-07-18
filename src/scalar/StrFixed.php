<?php
declare(strict_types = 1);
namespace RHo\UI;

class StrFixed extends AbstractFixedSizeString
{
    use StrValueTrait;

    protected const STR_ARRAY_ITEMS = [];

    /** @var array */
    private $items;

    protected function __construct($value, ?array $items = NULL)
    {
        $this->items = $items ?? static::STR_ARRAY_ITEMS;
        parent::__construct($value);
    }

    final protected function checkSyntax(): void
    {
        foreach ($this->items as $item)
            if ($item === $this->value)
                return;
        throw new Exception('Array item not found', Exception::ARRAY_ITEM_NOT_FOUND);
    }
}