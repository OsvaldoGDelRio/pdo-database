<?php
namespace src\pdoDataBase\consulta;

use src\FactoryClassInterface;

class CrearConsulta implements FactoryClassInterface
{
    public function crear(array $array): Consulta
    {
        return new Consulta(
            $array['conexion'],
            new Query(
                $array['sql'],
                $array['valores']
            )            
        );
    }
}