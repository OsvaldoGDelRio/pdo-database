<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\ValidadorDeParametrosInterface;

class ValidadorDeParametrosWhere implements ValidadorDeParametrosInterface
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

    public function setDatos($array): array
    {
        $this->numeroDeElementosValido($array);
        $this->contieneValoresVacios($array);
        $this->columnaEsString($array);
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

    private function numeroDeElementosValido($array): void
    {
        if(count($array) !== 3)
        {
            throw new Exception("Error Processing Request");
        }
    }

    private function operadorValido($array): void
    {
        if(!in_array($array[1], $this->_operadoresValidos))
        {
            throw new Exception("Error Processing Request");
        }
    }

    private function columnaEsString($array): void
    {
        if(!is_string($array[0]))
        {
            throw new Exception("Error Processing Request");
        }
    }
}