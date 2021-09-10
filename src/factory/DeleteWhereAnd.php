<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\delete\ConsultaDelete;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Delete as ElementoDelete;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereAndOthers;
use src\pdodatabase\elementos\WhereAnd;
use src\pdodatabase\sentencias\delete\SentenciaDelete;

class DeleteWhereAnd implements FactoryClassInterface
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
                    new WhereAnd(
                        new ValidadorDeParametrosWhereAndOthers(
                            $array['where']
                        )
                    )
                )
            )
        );
    }
}