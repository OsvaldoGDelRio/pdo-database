<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\OrdenOLimiteInterface;
use src\pdodatabase\elementos\Joins;

class SentenciaJoinOrdenOLimite
{
    private $_donde;
    private $_ordenOLimite;

    public function __construct(Joins $Joins, OrdenOLimiteInterface $ordenOLimiteInterface)
    {
        $this->_donde = $Joins;
        $this->_ordenOLimite = $ordenOLimiteInterface;

    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_ordenOLimite->sql();
    }
}