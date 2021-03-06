<?php
declare(strict_types = 1);
namespace RHo\UI;

use RHo\UIException\ArrayItemNotFoundException;

class StrList extends AbstractFixedSizeString
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
        throw new ArrayItemNotFoundException();
    }
}