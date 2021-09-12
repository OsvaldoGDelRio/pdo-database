<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\OrdenOLimiteInterface;
use src\pdodatabase\elementos\{CamposYTabla, Como};

class SentenciaSelectWhereOrdenOLimite 
{
    private $_donde;
    private $_como;
    private $_ordenOLimite;

    public function __construct(CamposYTabla $Donde, Como $Como, OrdenOLimiteInterface $ordenOLimiteInterface)
    {
        $this->_donde = $Donde;
        $this->_como = $Como;
        $this->_ordenOLimite = $ordenOLimiteInterface;
    }

    public function sql(): string
    {
        return 'SELECT '.$this->_donde->sql().' '.$this->_como->sql().' '.$this->_ordenOLimite->sql();
    }

    public function datos(): array
    {
        return $this->_como->datos();
    }
}