<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaJoinOrdenOLimite;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Join as ElementosJoin;
use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\NombreColumnaJoin;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\TipoDeJoin;
use src\pdodatabase\sentencias\select\SentenciaJoinOrdenOLimite;

class JoinOrderBy implements FactoryClassInterface
{
    private $_joins = [];

    public function crear(array $array): ConsultaJoinOrdenOLimite
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $sentencia = new SentenciaJoinOrdenOLimite(
            new Joins(
                new Tabla($array['tabla']),
                new Campos($array['campos']),
                $this->obtenerJoins($array)
            ),
            new Orden($array['order'])
        );
        
        return new ConsultaJoinOrdenOLimite(
            new EjecutarConsultaSinDatos(
                $conexion
            ),
            $sentencia
        );
    }

    private function obtenerJoins(array $array): array
    {
        foreach ($array['join'] as $value)
        {
            array_push($this->_joins, $this->crearJoin($value, $array['tabla']));           

            $this->multilplesJoin($value, $value['tabla']);
        }

        return $this->_joins;
    }

    private function crearJoin(array $array, string $tablaPadre): ElementosJoin
    {
        return new ElementosJoin(
            new TipoDeJoin($array['tipo']),
            new Tabla($tablaPadre),
            new Tabla($array['tabla']),
            new Campos($array['campos']),
            new NombreColumnaJoin($array['key'])
        );
    }

    private function multilplesJoin(array $value, string $tablaPadre): void
    {
        if(isset($value['join']))
        {
            foreach ($value['join'] as $value)
            {
               array_push($this->_joins, $this->crearJoin($value, $tablaPadre));
            }

            $this->multilplesJoin($value, $value['tabla']);
        }
    }
}