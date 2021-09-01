<?php
namespace src\pdodatabase\elementos;

use src\interfaces\DondeYDondeInterface;
use src\pdodatabase\elementos\Donde;

class YDonde implements DondeYDondeInterface
{
    private $_donde;
    private $_primerDonde;
    private $_segundoDonde;

    public function __construct(Donde $Donde, Donde $SegundoDonde)
    {
        $this->_primerDonde = $Donde;
        $this->_segundoDonde = $SegundoDonde;
        $this->_donde = $this->setDonde();
    }

    public function donde(): string
    {
        return $this->_donde;
    }

    public function datos(): array
    {
        return array($this->_primerDonde->datos()[0],$this->_segundoDonde->datos()[0]);
    }

    private function setDonde(): string
    {
        return ' WHERE '.$this->_primerDonde->donde().' AND '.$this->_segundoDonde->donde();
    }
}