<?php
namespace src\pdodatabase\sentencias\select;

use src\pdodatabase\elementos\CamposYTabla;

class SentenciaSelect
{
    private $_donde;
    
    public function __construct(CamposYTabla $Donde)
    {
        $this->_donde = $Donde;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql();
    }
}