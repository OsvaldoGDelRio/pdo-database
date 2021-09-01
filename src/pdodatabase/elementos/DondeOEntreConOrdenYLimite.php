<?php
namespace src\pdodatabase\elementos;

use src\interfaces\DondeOEntreInterface;
use src\interfaces\OrdenConLimiteInterface;

class DondeOEntreConOrdenYLimite
{
    private $_donde;
    private $_datos;

    public function __construct(DondeOEntreInterface $Donde, OrdenConLimiteInterface $ElementosConParametro)
    {
        $this->_datos = $Donde->datos();
        $this->_donde = $this->setDonde($Donde,$ElementosConParametro);
    }

    public function donde(): string
    {
        return $this->_donde;
    }

    public function datos(): array
    {
        return $this->_datos;
    }

    private function setDonde($Donde,$elementosConParametro): string
    {
        return $Donde->donde().$elementosConParametro->parametro();
    }
}