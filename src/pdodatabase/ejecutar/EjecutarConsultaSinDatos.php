<?php
namespace src\pdodatabase\ejecutar;

use Exception;
use PDOException;
use PDOStatement;
use src\pdodatabase\conexion\ConexionBaseDeDatos;

class EjecutarConsultaSinDatos 
{
    private $_conexion;

    public function __construct(ConexionBaseDeDatos $conexionBaseDeDatos)
    {
        $this->_conexion = $conexionBaseDeDatos->conectar();
    }

    public function query(string $sql): PDOStatement
    {
        $query = $this->_conexion->prepare($sql);
        
        try
        {
            $query->execute();
        }
        catch(PDOException $e)
        {
            throw new Exception("Error en la consulta");
        }
        

        return $query;
    }
}