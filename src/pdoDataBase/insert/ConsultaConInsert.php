<?php
namespace src\pdoDataBase\insert;

use src\FactoryClassInterface;

use src\pdoDatabase\select\Tabla;

use src\pdoDataBase\consulta\{Consulta, CrearConsulta};

use src\pdoDataBase\conexion\CrearConexionBaseDeDatos;

use src\pdoDataBase\insert\{
    Insert,
    ValoresAInsertar
};

class ConsultaConInsert implements FactoryClassInterface
{
    public function crear(array $array): Consulta
    {
        $consulta = new CrearConsulta;
        
        $conexion = new CrearConexionBaseDeDatos;
        
        $insert = new Insert(
            new Tabla($array['tabla']),
            new ValoresAInsertar(
                $array['valores']
            )
        );

        return $consulta->crear(array(
            'conexion' => $conexion->crear(array()),
            'sql' => $insert->insert(),
            'valores' => $array['valores']
        ));
    }
}