<?php
namespace src\pdodatabase\sentencias\sql;

use src\pdodatabase\elementos\Truncate;

class SentenciaTruncate
{
    private $_truncate;

    public function __construct(Truncate $truncate)
    {
        $this->_truncate = $truncate;
    }

    public function sql(): string
    {
        return 'TRUNCATE '.$this->_truncate->sql();
    }
}