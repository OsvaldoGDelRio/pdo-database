<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\UnidadDeValorInterface;

class Operador implements UnidadDeValorInterface
{
    private $_operadoresValidos = [
        '=',
        '>',
        '<',
        '>=',
        '<=',
        '<>',
        '!=',
        '!<',
        '!>',
        'LIKE',
        'IN',
    ];

    public function __construct(string $operador)
    {
        $this->operadorVacio($operador);
        $this->operadorValido($operador);
        $this->_operador = $operador;
    }

    public function valor(): string
    {
        return $this->_operador;
    }

    private function operadorVacio(string $operador)
    {
        if(empty($operador))
        {
            throw new Exception("Operador vacio"); 
        }
    }

    private function operadorValido(string $operador)
    {
        if(!in_array($operador,$this->_operadoresValidos))
        {
            throw new Exception("Operador no valido"); 
        }
    }
}