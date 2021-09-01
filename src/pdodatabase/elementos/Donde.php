<?php
namespace src\pdodatabase\elementos;

use Exception;

class Donde
{
    private $_donde;
    private $_datos;
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
    ];

    public function __construct(array $Donde)
    {
        $this->_donde = $this->setDonde($Donde);
    }

    public function donde(): string
    {
        return $this->_donde;
    }

    public function datos(): array
    {
        return $this->_datos;
    }

    private function setDonde(array $columnas): string
    {
        if(count($columnas) !== 3)
        {
            throw new Exception("Elementos faltantes o sobrantes en la sentencia WHERE", 1);
        }
        
        $this->operadorValido($columnas[1]);
        
        $this->_datos = $this->setDatos($columnas);

        return ' WHERE '.$columnas[0].' '.$columnas[1].' ? ';
    }

    private function operadorValido($string)
    {
        if (!in_array($string, $this->_operadoresValidos))
        {
            throw new Exception("Comparador lógico invalido en el campo de la sentencia WHERE");
        }
    }

    private function setDatos(array $columnas): array
    {
        return array($columnas[2]);
    }
}