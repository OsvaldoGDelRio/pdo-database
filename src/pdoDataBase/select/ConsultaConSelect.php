<?php
namespace src\pdoDataBase\select;

use src\FactoryClassInterface;

use src\pdoDatabase\select\{
    Select,
    Tabla,
    Campos,
    Donde,
    Entre,
    Limite,
    Orden
};

use src\pdoDataBase\consulta\{Consulta, Query, CrearConsulta};

use src\pdoDataBase\conexion\CrearConexionBaseDeDatos;

class ConsultaConSelect implements FactoryClassInterface
{
    public function crear(array $array): Consulta
    {
        $donde =  new Donde(
            new MasDonde($this->masDonde($array)),
            $this->donde($array)
        );

        $select = new Select(
            new Tabla($array['tabla']),
            new Campos($this->campos($array)),
            $donde,
            new Entre($this->entre($array)),
            new Limite($this->limite($array)),
            new Orden($this->orden($array))
        );

        $consulta = new CrearConsulta;
        $conexion = new CrearConexionBaseDeDatos;

        return $consulta->crear(array(
            $conexion->crear(array()),
            'sql' => $select->select(),
            'valores' => $donde->datos()
        ));
    }

    private function campos(array $array): array
    {
        if(isset($array['campos']))
        {
            return $array['campos'];
        }

        return [];
    }

    private function donde($array): array
    {
        if(isset($array['donde']))
        {
            return $array['donde'];
        }

        return [];
    }

    private function masDonde($array): array
    {
        if( is_array($this->donde($array)) && isset($array['masDonde']) )
        {
            return $array['masDonde'];
        }

        return [];
    }

    private function entre(array $array): array
    {
        if(isset($array['entre']))
        {
            return $array['entre'];
        }

        return [];
    }

    private function limite(array $array)
    {
        if(isset($array['limite']))
        {
            return $array['limite'];
        }
    }

    private function orden(array $array)
    {
        if(isset($array['orden']))
        {
            return $array['orden'];
        }
    }
}