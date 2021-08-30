<?php
namespace src\pdoDataBase\select;

class Limite
{
    private $_limite;

    public function __construct(?int $Limite = null)
    {
        $this->_limite = $this->setLimite($Limite);
    }

    public function limite(): string
    {
        return $this->_limite;
    }

    private function setLimite(?int $limite = null): string
    {
        $Limite = '';

        if($limite)
        {
            $Limite = ' LIMIT '.$limite;
        }
        
        return $Limite;
    }
}