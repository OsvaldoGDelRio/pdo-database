<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\OrdenOLimiteInterface;
use src\pdodatabase\elementos\CamposYTabla;

class SentenciaSelectOrdenOLimite
{
    private $_donde;
    private $_ordenOLimite;
    
    public function __construct(CamposYTabla $Donde, OrdenOLimiteInterface $ordenOLimiteInterface)
    {
        $this->_donde = $Donde;
        $this->_ordenOLimite = $ordenOLimiteInterface;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_ordenOLimite->sql();
    }
}