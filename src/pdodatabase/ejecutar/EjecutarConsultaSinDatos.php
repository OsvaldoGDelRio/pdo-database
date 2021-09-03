<?php
namespace src\pdodatabase\ejecutar;

use PDOStatement;
use src\pdodatabase\conexion\ConexionBaseDeDatos;

class EjecutarConsultaSinDatos
{
    private $_conexion;

    public function __construct(ConexionBaseDeDatos $conexionBaseDeDatos)
    {
        $this->_conexion = $conexionBaseDeDatos->conectar();
    }

    public function query(): PDOStatement
    {
        $query = $this->_conexion->prepare($SentenciaSinDatosInterface->sql());
        
        $query->execute();

        return $query;
    }
}