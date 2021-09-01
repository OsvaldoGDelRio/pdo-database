<?php
namespace src\pdodatabase\conexion;

class UsuarioBaseDeDatos
{
    private $_usuariobaseDeDatos;

    public function __construct(string $nombreUsuarioBaseDeDatos)
    {
        $this->_usuariobaseDeDatos = $this->setUsuarioBaseDeDatos($nombreUsuarioBaseDeDatos);
    }

    public function usuariobaseDeDatos(): string
    {
        return $this->_usuariobaseDeDatos;
    }

    private function setUsuarioBaseDeDatos(string $nombreUsuarioBaseDeDatos): string
    {
        return $nombreUsuarioBaseDeDatos;
    }
}