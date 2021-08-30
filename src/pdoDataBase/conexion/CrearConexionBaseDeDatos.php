<?php
namespace src\pdoDataBase\conexion;

use src\FactoryClassInterface;
use src\pdoDataBase\conexion\{
    ConexionBaseDeDatos,
    HostBaseDeDatos,
    BaseDeDatos,
    UsuarioBaseDeDatos,
    ContraseñaBaseDeDatos
};

class CrearConexionBaseDeDatos implements FactoryClassInterface
{
    public function crear(array $array): ConexionBaseDeDatos
    {
        return new ConexionBaseDeDatos(
            new HostBaseDeDatos('127.0.0.1'),
            new BaseDeDatos('test'),
            new UsuarioBaseDeDatos('root'),
            new ContraseñaBaseDeDatos('')
        );
    }
}