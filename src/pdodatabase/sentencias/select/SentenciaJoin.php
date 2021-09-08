<?php
namespace src\pdodatabase\sentencias\select;

use src\pdodatabase\elementos\Joins;

class SentenciaJoin
{
    private $_donde;
    
    public function __construct(Joins $Joins)
    {
        $this->_donde = $Joins;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql();
    }
}