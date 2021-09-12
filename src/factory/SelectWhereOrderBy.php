<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelectWhereOrdenOLimite;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\select\SentenciaSelectWhereOrdenOLimite;

class SelectWhereOrderBy implements FactoryClassInterface
{
    public function crear(array $array): ConsultaSelectWhereOrdenOLimite
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaSelectWhereOrdenOLimite(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaSelectWhereOrdenOLimite(
                new CamposYTabla(
                    new Campos($array['campos']),
                    new Tabla($array['tabla'])
                ),
                new Como(
                    new Where(
                        new ValidadorDeParametrosWhere(
                            $array['where']
                        )
                    )
                ),
                new Orden($array['order'])
            )
        );
    }
}