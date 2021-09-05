<?php
namespace src\pdodatabase\sentencias\delete;

use src\pdodatabase\elementos\Delete;

class SentenciaDelete 
{
    private $_como;

    public function __construct(Delete $delete)
    {
        $this->_como = $delete;
    }

    public function sql(): string
    {
        return 'DELETE FROM '.$this->_como->sql();
    }

    public function datos(): array
    {
        return $this->_como->datos();
    }
}