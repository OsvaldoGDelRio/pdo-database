<?php
namespace src\pdoDataBase\update;

use src\FactoryClassInterface;

use src\pdoDatabase\select\{
    Tabla,
    Donde,
    MasDonde
};

use src\pdoDatabase\insert\ValoresAInsertar;

use src\pdoDataBase\consulta\{Consulta, CrearConsulta};

use src\pdoDataBase\conexion\CrearConexionBaseDeDatos;

use src\pdoDataBase\update\Update;

class ConsultaConUpdate implements FactoryClassInterface
{
    public function crear(array $array): Consulta
    {
        $consulta = new CrearConsulta;
        
        $conexion = new CrearConexionBaseDeDatos;
        
        $donde = new Donde(
            new MasDonde(
                array()
            ),
            $array['donde']
        );

        $update = new Update(
            new Tabla($array['tabla']),
            $donde,
            new ValoresAInsertar(
                $array['valores']
            )
        );

        return $consulta->crear(array(
            'conexion' => $conexion->crear(array()),
            'sql' => $update->update(),
            'valores' => $this->juntarValores($array['valores'],$donde->datos())
        ));
    }

    private function juntarValores(array $array, array $array2): array
    {
        array_push($array, $array2[0]);
        return $array;
    }
}