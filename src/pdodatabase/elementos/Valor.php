<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\UnidadDeValorInterface;

class Valor implements UnidadDeValorInterface
{
    private $_valor;

    public function __construct(string $valor)
    {
        $this->valorVacio($valor);
        $this->_valor = $valor;
    }

    public function valor(): string
    {
        return $this->_valor;
    }

    private function valorVacio(string $valor)
    {
        if(empty($valor))
        {
            throw new Exception("Valor vacio"); 
        }
    }
}