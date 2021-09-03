<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\ValidadorDeParametrosInterface;

class ValidadorDeParametrosWhereAndOthers implements ValidadorDeParametrosInterface
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

    private $_datos;

    public function __construct(array $datos)
    {
        $this->_datos = $this->setDatos($datos);
    }

    public function datos(): array
    {
        return $this->_datos;
    }

    private function setDatos($array): array
    {
        $this->numeroDeElementosValido($array);
        $this->contieneValoresVacios($array);
        $this->columnasSonString($array);
        $this->operadorValido($array);

        return $array;
    }

    private function contieneValoresVacios($array): void
    {
        foreach ($array as $value)
        {
            if(empty($value))
            {
                throw new Exception("Error Processing Request");
            }
        }
    }

    private function columnasSonString($array): void
    {
        if(!is_string($array[0]) || !is_string($array[3]))
        {
            throw new Exception("Error Processing Request");
        }
    }

    private function numeroDeElementosValido($array): void
    {
        if(count($array) !== 6)
        {
            throw new Exception("Error Processing Request");
        }
    }

    private function operadorValido($array): void
    {
        if(!in_array($array[1], $this->_operadoresValidos) || !in_array($array[4], $this->_operadoresValidos))
        {
            throw new Exception("Error Processing Request");
        }
    }

}