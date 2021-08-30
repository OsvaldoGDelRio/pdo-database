<?php
namespace src\pdoDataBase\select;

class Orden
{
    private $_orden;

    public function __construct(?string $Orden = null)
    {
        $this->_orden = $this->setOrden($Orden);
    }

    public function orden(): string
    {
        return $this->_orden;
    }

    private function setOrden(?string $orden = null): string
    {
        $Orden = '';

        if($orden)
        {
            $Orden = ' ORDER BY '.$orden;
        }
        
        return $Orden;
    }
}