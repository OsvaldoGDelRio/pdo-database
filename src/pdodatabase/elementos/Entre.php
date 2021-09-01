<?php
namespace src\pdodatabase\elementos;

use Exception;

class Entre
{
    private $_entre;
    private $_datos;

    public function __construct(array $Entre)
    {
        $this->_entre = $this->setEntre($Entre);
    }

    public function donde(): string
    {
        return $this->_entre;
    }

    public function datos(): array
    {
        return $this->_datos;
    }

    private function setEntre(array $columnas): string
    {
        if(count($columnas) !== 3)
        {
            throw new Exception("Faltan elementos en la sentencia BETWEEN");   
        }

        foreach($columnas as $columna)
        {
            $this->alfaNumerico($columna);
        }

        $this->_datos = $this->setDatos($columnas);
        
        return ' WHERE '.$columnas[0].' BETWEEN ? AND ?';
    }

    private function alfaNumerico($string)
    {
        if(!ctype_alnum($string))
        {
            throw new Exception("Caracter invalido en el campo de la sentencia BETWEEN");
        }
    }

    private function setDatos(array $columnas): array
    {
        return array($columnas[1],$columnas[2]);
    }
}