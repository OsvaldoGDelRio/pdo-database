<?php
namespace src\pdodatabase\sentencias\select;

use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\OrdenYLimite;

class SentenciaJoinOrdenYLimite
{
    private $_donde;
    private $_ordenYLimite;

    public function __construct(Joins $Joins, OrdenYLimite $OrdenYLimite)
    {
        $this->_donde = $Joins;
        $this->_ordenYLimite = $OrdenYLimite;

    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_ordenYLimite->sql();
    }
}