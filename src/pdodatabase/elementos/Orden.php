<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\ElementoConParametroInterface;

class Orden implements ElementoConParametroInterface
{
    private $_orden;

    public function __construct(string $Orden)
    {
        $this->_orden = $this->setOrden($Orden);
    }

    public function parametro(): string
    {
        return $this->_orden;
    }

    private function setOrden(string $orden): string
    {
        if(empty($orden))
        {
            throw new Exception("La sentencia ORDEN BY no puede estar vacia"); 
        }

        return ' ORDER BY '.$orden;
    }
}