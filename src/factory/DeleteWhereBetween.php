<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\delete\ConsultaDelete;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Delete as ElementoDelete;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereBetween;
use src\pdodatabase\elementos\WhereBetween;
use src\pdodatabase\sentencias\delete\SentenciaDelete;

class DeleteWhereBetween implements FactoryClassInterface
{
    public function crear(array $array): ConsultaDelete
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaDelete(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaDelete(
                new ElementoDelete(
                    new Tabla($array['tabla']),
                    new WhereBetween(
                        new ValidadorDeParametrosWhereBetween(
                            $array['where']
                        )
                    )
                )
            )
        );
    }
}