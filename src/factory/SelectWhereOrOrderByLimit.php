<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelectWhereOrdenYLimite;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Limite;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\OrdenYLimite;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereAndOthers;
use src\pdodatabase\elementos\WhereOr;
use src\pdodatabase\sentencias\select\SentenciaSelectWhereOrdenYLimite;

class SelectWhereOrOrderByLimit implements FactoryClassInterface
{
    public function crear(array $array): ConsultaSelectWhereOrdenYLimite
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaSelectWhereOrdenYLimite(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaSelectWhereOrdenYLimite(
                new CamposYTabla(
                    new Campos($array['campos']),
                    new Tabla($array['tabla'])
                ),
                new Como(
                    new WhereOr(
                        new ValidadorDeParametrosWhereAndOthers(
                            $array['where']
                        )
                    )
                ),
                new OrdenYLimite(
                    new Orden($array['order']),
                    new Limite($array['limit'])
                )
            )
        );
    }
}