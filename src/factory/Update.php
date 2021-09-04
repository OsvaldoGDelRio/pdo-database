<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\update\ConsultaUpdate;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Update as ElementoUpdate;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\update\SentenciaUpdate;

class Update implements FactoryClassInterface
{
    public function crear(array $array): object
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaUpdate(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaUpdate(
                new Tabla($array['tabla']),
                new ElementoUpdate(
                    $array['valores'],
                    new Where(
                        new ValidadorDeParametrosWhere($array['where'])
                    )
                )
            )
        );
    }
}