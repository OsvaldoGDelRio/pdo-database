<?php
namespace src\pdodatabase\sentencias\select;

use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\OrdenYLimite;

class SentenciaSelectOrdenYLimite
{
    private $_donde;
    private $_ordenYLimite;
    
    public function __construct(CamposYTabla $Donde, OrdenYLimite $OrdenYLimite)
    {
        $this->_donde = $Donde;
        $this->_ordenYLimite = $OrdenYLimite;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_ordenYLimite->sql();
    }
}