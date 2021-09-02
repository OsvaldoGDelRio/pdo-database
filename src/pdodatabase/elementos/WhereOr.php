<?php
namespace src\pdodatabase\elementos;

use src\interfaces\SentenciaDeComparacionInterface;
use src\interfaces\WhereAndOthersInterface;
use src\interfaces\WhereInterface;

class WhereOr implements WhereAndOthersInterface
{
    private $_where;
    private $_sentencia;

    public function __construct(WhereInterface $whereInterface, SentenciaDeComparacionInterface $SentenciaDeComparacionInterface)
    {
        $this->_where = $whereInterface;
        $this->_sentencia = $SentenciaDeComparacionInterface;
    }

    public function sql(): string
    {
        return $this->_where->sql().' OR '.$this->_sentencia->sql();
    }

    public function datos(): array
    {
        $array = $this->_where->datos();
        array_push($array,$this->_sentencia->datos()[0]);

        return $array;        
    }
}