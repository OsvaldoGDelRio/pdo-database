<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelectOrdenOLimite;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\sentencias\select\SentenciaSelectOrdenOLimite;

class SelectOrderBy implements FactoryClassInterface
{
    public function crear(array $array): ConsultaSelectOrdenOLimite
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaSelectOrdenOLimite(
            new EjecutarConsultaSinDatos(
                $conexion
            ),
            new SentenciaSelectOrdenOLimite(
                new CamposYTabla(
                    new Campos($array['campos']),
                    new Tabla($array['tabla'])
                ),
                new Orden($array['order'])
            )
        );
    }
}