<?php
namespace src\pdodatabase\conexion;

use Exception;

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
        if(empty($nombreUsuarioBaseDeDatos))
        {
            throw new Exception("El nombre del host de la base de datos no puede estar vacio");
        }

        return $nombreUsuarioBaseDeDatos;
    }
}