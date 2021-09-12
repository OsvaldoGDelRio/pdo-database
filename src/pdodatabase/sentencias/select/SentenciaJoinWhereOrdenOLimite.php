<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\OrdenOLimiteInterface;
use src\interfaces\WhereInterface;
use src\pdodatabase\elementos\Joins;

class SentenciaJoinWhereOrdenOLimite
{
    private $_donde;
    private $_where;
    private $_ordenOLimite;
    
    public function __construct(Joins $Joins, WhereInterface $whereInterface, OrdenOLimiteInterface $ordenOLimiteInterface)
    {
        $this->_where = $whereInterface;
        $this->_donde = $Joins;
        $this->_ordenOLimite = $ordenOLimiteInterface;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_where->sql().' '.$this->_ordenOLimite->sql();
    }

    public function datos(): array
    {
        return $this->_where->datos();
    }
}