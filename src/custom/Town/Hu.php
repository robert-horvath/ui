<?php
declare(strict_types = 1);
namespace RHo\UI\Town;

use RHo\UI\ {
    AbstractInteger,
    StrValueTrait,
    Exception
};

/**
 * https://www.posta.hu/szolgaltatasok/iranyitoszam-kereso
 */
class Hu extends AbstractInteger
{
    
    use StrValueTrait;

    private const SQLITE_DB_PATH = __DIR__ . '/hu-ui.sqlite';

    protected const MIN_INT = 0;

    protected const MAX_INT = 3572;

    protected function checkSyntax(): void
    {
        parent::checkSyntax();
        $db = new \SQLite3(self::SQLITE_DB_PATH, SQLITE3_OPEN_READONLY);
        $this->value = $db->querySingle("SELECT town FROM settlements WHERE id=" . $this->value);
        if ($this->value === NULL)
            throw new Exception('Not allowed integer value', Exception::NOT_ALLOWED_INT_VALUE);
    }
}