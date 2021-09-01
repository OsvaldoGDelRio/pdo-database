<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\UnidadDeValorInterface;

class Columna implements UnidadDeValorInterface
{
    private $_columna;

    public function __construct(string $columna)
    {
        $this->columnaVacia($columna);
        $this->_columna = $columna;
    }

    public function valor(): string
    {
        return $this->_columna;
    }

    private function columnaVacia(string $columna)
    {
        if(empty($columna))
        {
            throw new Exception("columna vacia"); 
        }
    }
}