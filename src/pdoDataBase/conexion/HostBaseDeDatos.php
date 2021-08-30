<?php
namespace src\pdoDataBase\conexion;

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
        return $nombreHostBaseDeDatos;
    }
}