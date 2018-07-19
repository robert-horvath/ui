<?php
declare(strict_types = 1);
namespace RHo\UI\Zip;

use RHo\UIException\Exception;
use RHo\UI\ {
    AbstractInteger,
    StrValueTrait
};

/**
 * https://www.posta.hu/szolgaltatasok/iranyitoszam-kereso
 */
class Hu extends AbstractInteger
{
    
    use StrValueTrait;

    private const SQLITE_DB_PATH = __DIR__ . '/hu-ui.sqlite';

    protected const MIN_INT = 1000;

    protected const MAX_INT = 9999;

    protected function checkSyntax(): void
    {
        parent::checkSyntax();
        $db = new \SQLite3(self::SQLITE_DB_PATH, SQLITE3_OPEN_READONLY);
        if ($db->querySingle("SELECT COUNT(*) FROM postal_codes WHERE zip=" . $this->value) === 0)
            throw new Exception('Integer number not allowed', Exception::INT_NUMBER_NOT_ALLOWED);
        $this->value = strval($this->value);
    }
}