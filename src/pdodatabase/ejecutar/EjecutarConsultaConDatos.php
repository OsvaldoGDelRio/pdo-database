<?php
namespace src\pdodatabase\ejecutar;

use PDOStatement;
use src\pdodatabase\conexion\ConexionBaseDeDatos;

class EjecutarConsultaConDatos
{
    private $_conexion;

    public function __construct(ConexionBaseDeDatos $conexionBaseDeDatos)
    {
        $this->_conexion = $conexionBaseDeDatos->conectar();
    }

    public function query(): PDOStatement
    {
        $query = $this->_conexion->prepare($SentenciaConDatosInterface->sql());

        $x=1;
        foreach ($SentenciaConDatosInterface->datos() as $value)
        {
            $query->bindValue($x,$value);
            $x++;	
        }
        
        $query->execute();

        return $query;
    }
}