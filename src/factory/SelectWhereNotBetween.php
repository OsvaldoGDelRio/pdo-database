<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereBetween;
use src\pdodatabase\elementos\WhereNotBetween;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;

class SelectWhereNotBetween implements FactoryClassInterface
{
    public function crear(array $array): object
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaSelectWhere(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaSelectWhere(
                new CamposYTabla(
                    new Campos($array['campos']),
                    new Tabla($array['tabla'])
                ),
                new Como(
                    new WhereNotBetween(
                        new ValidadorDeParametrosWhereBetween(
                            $array['where']
                        )
                    )
                )
            )
        );
    }
}