<?php
namespace src\pdodatabase\conexion;

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
        return $nombreBaseDeDatos;
    }
}