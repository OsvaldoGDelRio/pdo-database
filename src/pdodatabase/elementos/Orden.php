<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\OrdenOLimiteInterface;

class Orden implements OrdenOLimiteInterface
{
    private $_orden;

    public function __construct(string $orden)
    {
        $this->_orden = $this->setOrden($orden);
    }

    public function sql(): string
    {
        return 'ORDER BY '. $this->_orden;
    }

    private function setOrden(string $orden): string
    {
        $this->estaVacio($orden);

        return $orden;
    }

    private function estaVacio(string $orden): void
    {
        if(empty($orden))
        {
            throw new Exception("La sentencia ORDER BY no puede estar vacía");
            
        }
    }
}