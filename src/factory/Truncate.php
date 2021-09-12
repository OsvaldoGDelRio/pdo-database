<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\sql\ConsultaTruncate;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Truncate as ElementoTruncate;
use src\pdodatabase\sentencias\sql\SentenciaTruncate;

class Truncate implements FactoryClassInterface
{
    public function crear(array $array): ConsultaTruncate
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaTruncate(
            new EjecutarConsultaSinDatos(
                $conexion
            ),
            new SentenciaTruncate(
                new ElementoTruncate(
                    new Tabla($array['tabla'])
                )
            )
        );
    }
}