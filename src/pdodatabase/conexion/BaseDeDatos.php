<?php
namespace src\pdodatabase\conexion;

use Exception;

class BaseDeDatos
{
    private $_baseDeDatos;

    public function __construct(string $nombreBaseDeDatos)
    {
        $this->_baseDeDatos = $this->setBaseDeDatos($nombreBaseDeDatos);
    }

    public function baseDeDatos(): string
    {
        return $this->_baseDeDatos;
    }

    private function setBaseDeDatos(string $nombreBaseDeDatos): string
    {
        if(empty($nombreBaseDeDatos))
        {
            throw new Exception("El nombre de la base de datos no puede estar vacio");
        }

        return $nombreBaseDeDatos;
    }
}