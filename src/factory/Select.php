<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\Select as SelectSe;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\sentencias\select\Select as SelectSelect;

class Select implements FactoryClassInterface
{
    public function crear(array $array): object
    {
        $conexion = new CrearConexionBaseDeDatos;

        return 
        new SelectSe(
            new EjecutarConsultaSinDatos(
                $conexion->crear([])
            ),
            new SelectSelect(
                new Tabla($array['tabla']),
                new Campos($array['campos'])
            )
        );
    }
}