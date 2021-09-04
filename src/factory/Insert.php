<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\insert\ConsultaInsert;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Insert as ElementoInsert;
use src\pdodatabase\sentencias\insert\SentenciaInsert;

class Insert implements FactoryClassInterface
{
    public function crear(array $array): object
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaInsert(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaInsert(
                new Tabla($array['tabla']),
                new ElementoInsert(
                    $array['valores'])
            )
        );
    }
}