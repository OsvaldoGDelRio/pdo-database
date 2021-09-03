<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\ValidadorDeParametrosInterface;

class ValidadorDeParametrosWhereBetween implements ValidadorDeParametrosInterface
{
    private $_datos;

    public function __construct(array $datos)
    {
        $this->_datos = $this->setDatos($datos);
    }

    public function datos(): array
    {
        return $this->_datos;
    }

    private function setDatos(array $array): array
    {
        $this->numeroDeElementosValido($array);
        $this->columnaEsString($array);       
        $this->valoresNoSonIguales($array);
        $this->contieneValoresVacios($array);

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

    private function valoresNoSonIguales($array): void
    {
        if($array[1] == $array[2])
        {
            throw new Exception("Error Processing Request");
        }
    }

    private function numeroDeElementosValido($array): void
    {
        if(count($array) !== 3)
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