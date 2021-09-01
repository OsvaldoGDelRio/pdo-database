<?php
namespace src\pdodatabase\conexion;

use Exception;

class HostBaseDeDatos
{
    private $_hostbaseDeDatos;

    public function __construct(string $nombreHostBaseDeDatos)
    {
        $this->_hostbaseDeDatos = $this->setHostBaseDeDatos($nombreHostBaseDeDatos);
    }

    public function hostbaseDeDatos(): string
    {
        return $this->_hostbaseDeDatos;
    }

    private function setHostBaseDeDatos(string $nombreHostBaseDeDatos): string
    {
        if(empty($nombreHostBaseDeDatos))
        {
            throw new Exception("El nombre del host de la base de datos no puede estar vacio");
        }

        return $nombreHostBaseDeDatos;
    }
}