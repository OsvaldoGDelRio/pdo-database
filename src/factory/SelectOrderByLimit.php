<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelectOrdenYLimite;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Limite;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\OrdenYLimite;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\sentencias\select\SentenciaSelectOrdenYLimite;

class SelectOrderByLimit implements FactoryClassInterface
{
    public function crear(array $array): ConsultaSelectOrdenYLimite
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaSelectOrdenYLimite(
            new EjecutarConsultaSinDatos(
                $conexion
            ),
            new SentenciaSelectOrdenYLimite(
                new CamposYTabla(
                    new Campos($array['campos']),
                    new Tabla($array['tabla'])
                ),
                new OrdenYLimite(
                    new Orden($array['order']),
                    new Limite($array['limit'])
                )
            )
        );
    }
}