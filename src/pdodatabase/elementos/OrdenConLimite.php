<?php
namespace src\pdodatabase\elementos;

use src\interfaces\OrdenConLimiteInterface;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Limite;

class OrdenConLimite implements OrdenConLimiteInterface
{
    private $_orden;

    public function __construct(Orden $Orden, Limite $Limite)
    {
        $this->_orden = $this->setOrden($Orden,$Limite);
    }

    public function parametro(): string
    {
        return $this->_orden;
    }

    private function setOrden($orden,$limite): string
    {
        return $orden->parametro().$limite->parametro();
    }
}