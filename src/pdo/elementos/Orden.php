<?php
namespace src\pdodatabase\elementos;

use Exception;

class Orden
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

        $this->alfaNumerico($orden);

        return ' ORDER BY '.$orden;
    }

    private function alfaNumerico($string)
    {
        if(!ctype_alnum($string))
        {
            throw new Exception("Caracter invalido en el campo de la sentencia ORDEN BY");
        }
    }
}