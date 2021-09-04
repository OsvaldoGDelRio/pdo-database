<?php
namespace src\pdodatabase\conexion;
/*
En esta clase se colocan los datos para acceder a la BASE DE DATOS
o se importan desde cualquier archivo con require_once que retorne un array
*/
use src\FactoryClassInterface;

use src\pdodatabase\conexion\{
    ConexionBaseDeDatos,
    HostBaseDeDatos,
    BaseDeDatos,
    UsuarioBaseDeDatos,
    ContrasenaBaseDeDatos
};

class CrearConexionBaseDeDatos implements FactoryClassInterface
{
    public function crear(array $array): ConexionBaseDeDatos
    {
        return new ConexionBaseDeDatos(
            new HostBaseDeDatos('127.0.0.1'),
            new BaseDeDatos('test'),
            new UsuarioBaseDeDatos('root'),
            new ContrasenaBaseDeDatos('')
        );
    }
}