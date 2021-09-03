<?php
namespace src\pdodatabase\ejecutar;

use Exception;
use PDOException;
use PDOStatement;
use src\pdodatabase\conexion\ConexionBaseDeDatos;

class EjecutarConsultaConDatos
{
    private $_conexion;

    public function __construct(ConexionBaseDeDatos $conexionBaseDeDatos)
    {
        $this->_conexion = $conexionBaseDeDatos->conectar();
    }

    public function query(object $sentencia): PDOStatement
    {
        $query = $this->_conexion->prepare($sentencia->sql());

        $x=1;
        foreach ($sentencia->datos() as $value)
        {
            $query->bindValue($x,$value);
            $x++;	
        }
        
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