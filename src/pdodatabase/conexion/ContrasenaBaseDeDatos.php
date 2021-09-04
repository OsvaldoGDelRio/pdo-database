<?php
namespace src\pdodatabase\conexion;

class ContrasenaBaseDeDatos
{
    private $_contrasenaBaseDeDatos;

    public function __construct(string $nombreContrasenaBaseDeDatos)
    {
        $this->_contrasenaBaseDeDatos = $this->setContrasenaBaseDeDatos($nombreContrasenaBaseDeDatos);
    }

    public function contrasenaBaseDeDatos(): string
    {
        return $this->_contrasenaBaseDeDatos;
    }

    private function setContrasenaBaseDeDatos(string $nombreContrasenaBaseDeDatos): string
    {
        return $nombreContrasenaBaseDeDatos;
    }
}