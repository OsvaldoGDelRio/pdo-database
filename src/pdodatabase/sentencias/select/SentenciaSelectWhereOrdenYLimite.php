<?php
namespace src\pdodatabase\sentencias\select;

use src\pdodatabase\elementos\{CamposYTabla, Como, OrdenYLimite};

class SentenciaSelectWhereOrdenYLimite 
{
    private $_donde;
    private $_como;
    private $_ordenYLimite;

    public function __construct(CamposYTabla $Donde, Como $Como, OrdenYLimite $OrdenYLimite)
    {
        $this->_donde = $Donde;
        $this->_como = $Como;
        $this->_ordenYLimite = $OrdenYLimite;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_como->sql().' '.$this->_ordenYLimite->sql();
    }

    public function datos(): array
    {
        return $this->_como->datos();
    }
}