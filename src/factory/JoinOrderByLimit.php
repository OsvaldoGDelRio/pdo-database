<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaJoinOrdenYLimite;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Join as ElementosJoin;
use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\Limite;
use src\pdodatabase\elementos\NombreColumnaJoin;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\OrdenYLimite;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\TipoDeJoin;
use src\pdodatabase\sentencias\select\SentenciaJoinOrdenYLimite;

class JoinOrderByLimit implements FactoryClassInterface
{
    private $_joins = [];

    public function crear(array $array): ConsultaJoinOrdenYLimite
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $sentencia = new SentenciaJoinOrdenYLimite(
            new Joins(
                new Tabla($array['tabla']),
                new Campos($array['campos']),
                $this->obtenerJoins($array)
            ),
            new OrdenYLimite(
                new Orden($array['order']),
                new Limite($array['limit'])
            )
            
        );
        
        return new ConsultaJoinOrdenYLimite(
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