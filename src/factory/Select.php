<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\sentencias\select\SentenciaSelect;

class Select implements FactoryClassInterface
{
    public function crear(array $array): object
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        return new ConsultaSelect(
            new EjecutarConsultaSinDatos(
                $conexion
            ),
            new SentenciaSelect(
                new CamposYTabla(
                    new Campos($array['campos']),
                    new Tabla($array['tabla'])
                )
            )
        );
    }
}