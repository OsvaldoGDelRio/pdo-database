<?php
namespace src\factory;

use src\FactoryClassInterface;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\SelectWhere as ConsultaSelectSelectWhere;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Columna;
use src\pdodatabase\elementos\Operador;
use src\pdodatabase\elementos\SentenciaDeComparacionColumnaOperadorValor;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Valor;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\select\SelectWhere as SelectSelectWhere;
use src\pdodatabase\sentencias\select\Select as Select;

class SelectWhere implements FactoryClassInterface
{
    public function crear(array $array): ConsultaSelectSelectWhere
    {
        $conexion = new CrearConexionBaseDeDatos;
        
        return new ConsultaSelectSelectWhere(
            new EjecutarConsultaConDatos(
                $conexion->crear([])
            ),
            new SelectSelectWhere(
                new Select(
                    new Tabla($array['tabla']),
                    new Campos($array['campos'])
                ),
                new Where(
                   new SentenciaDeComparacionColumnaOperadorValor(
                       new Columna($array['where'][0]),
                       new Operador($array['where'][1]),
                       new Valor($array['where'][2])
                   ) 
                )
            )
        );
    }
}