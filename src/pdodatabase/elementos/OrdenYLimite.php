<?php
namespace src\pdodatabase\elementos;

use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Limite;

class OrdenYLimite
{
    private $_orden;
    private $_limite;

    public function __construct(Orden $orden, Limite $limite)
    {
        $this->_orden = $orden;
        $this->_limite = $limite;
    }

    public function sql(): string
    {
        return $this->_orden->sql().' '.$this->_limite->sql();
    }
}