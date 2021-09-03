<?php
namespace src\pdodatabase\sentencias\select;

use src\pdodatabase\elementos\{CamposYTabla, Como};

class SentenciaSelectWhere 
{
    private $_donde;
    private $_como;

    public function __construct(CamposYTabla $Donde, Como $Como)
    {
        $this->_donde = $Donde;
        $this->_como = $Como;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_como->sql();
    }

    public function datos(): array
    {
        return $this->_como->datos();
    }
}