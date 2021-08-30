<?php
namespace src\pdoDataBase\insert;

use Exception;

class ValoresAInsertar
{
    private array $_valoresAInsertar;

    public function __construct(array $array)
    {
        $this->_valoresAInsertar = $this->setValoresAInsertar($array);
    }

    public function valoresAInsertar(): array
    {
        return $this->_valoresAInsertar;
    }

    private function setValoresAInsertar(array $array): array
    {
        if(count($array) < 1)
        {
            throw new Exception("Error, no hay valores para insertar");   
        }

        return $array;
    }
}