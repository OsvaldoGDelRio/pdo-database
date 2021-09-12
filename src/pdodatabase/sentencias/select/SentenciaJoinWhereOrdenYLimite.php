<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\WhereInterface;
use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\OrdenYLimite;

class SentenciaJoinWhereOrdenYLimite
{
    private $_donde;
    private $_where;
    private $_ordenYLimite;
    
    public function __construct(Joins $Joins, WhereInterface $whereInterface, OrdenYLimite $OrdenYLimite)
    {
        $this->_where = $whereInterface;
        $this->_donde = $Joins;
        $this->_ordenYLimite = $OrdenYLimite;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_where->sql().' '.$this->_ordenYLimite->sql();
    }

    public function datos(): array
    {
        return $this->_where->datos();
    }
}