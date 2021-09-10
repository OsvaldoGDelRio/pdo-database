<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\WhereInterface;
use src\pdodatabase\elementos\Joins;

class SentenciaJoinWhere
{
    private $_donde;
    private $_where;
    
    public function __construct(Joins $Joins, WhereInterface $whereInterface)
    {
        $this->_where = $whereInterface;
        $this->_donde = $Joins;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_where->sql();
    }

    public function datos(): array
    {
        return $this->_where->datos();
    }
}