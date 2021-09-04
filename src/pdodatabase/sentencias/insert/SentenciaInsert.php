<?php
namespace src\pdodatabase\sentencias\insert;

use src\pdodatabase\elementos\{Tabla,Insert};

class SentenciaInsert
{
    private $_donde;
    private $_insert;
    
    public function __construct(Tabla $Donde, Insert $Insert)
    {
        $this->_donde = $Donde;
        $this->_insert = $Insert;
    }

    public function sql(): string
    {
        return 'INSERT INTO '.$this->_donde->sql().' '.$this->_insert->sql();
    }

    public function datos(): array
    {
        return $this->_insert->datos();
    }
}