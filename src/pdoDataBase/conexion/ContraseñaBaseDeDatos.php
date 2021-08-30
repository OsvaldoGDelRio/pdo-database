<?php
namespace src\pdoDataBase\conexion;

class ContraseñaBaseDeDatos
{
    private $_contraseñaBaseDeDatos;

    public function __construct(string $nombreContraseñaBaseDeDatos)
    {
        $this->_contraseñaBaseDeDatos = $this->setContraseñaBaseDeDatos($nombreContraseñaBaseDeDatos);
    }

    public function contraseñaBaseDeDatos(): string
    {
        return $this->_contraseñaBaseDeDatos;
    }

    private function setContraseñaBaseDeDatos(string $nombreContraseñaBaseDeDatos): string
    {
        return $nombreContraseñaBaseDeDatos;
    }
}