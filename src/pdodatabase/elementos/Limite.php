<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\ElementoConParametroInterface;

class Limite implements ElementoConParametroInterface
{
    private $_limite;

    public function __construct(string $Limite)
    {
        $this->_limite = $this->setLimite($Limite);
    }

    public function parametro(): string
    {
        return $this->_limite;
    }

    private function setLimite(string $limite): string
    {
        if (empty($limite))
        {
            throw new Exception("La sentencia LIMITE no puede estar vacia");
        }

        $this->numero($limite);

        return ' LIMIT '.$limite;
    }

    private function numero($limite)
    {
        if(!is_numeric($limite))
        {
            throw new Exception("La sentencia LIMITE solo puede ser número");
        }
    }
}