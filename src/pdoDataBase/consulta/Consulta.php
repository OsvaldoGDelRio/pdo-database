<?php
namespace src\pdoDataBase\consulta;

use src\excepciones\ConsultaException;
use PDOException;
use PDOStatement;
use src\pdoDataBase\conexion\ConexionBaseDeDatos;
use src\pdoDatabase\consulta\Query;

class Consulta
{
    private $_conexionBaseDeDatos;
    private $_query;

    public function __construct
    (
        ConexionBaseDeDatos $ConexionBaseDeDatos,
        Query $Query
    )
    {
        $this->_conexionBaseDeDatos = $ConexionBaseDeDatos->conectar();
        $this->_query = $Query;
    }

    public function consulta(): PDOStatement
	{
		$consulta = $this->_conexionBaseDeDatos->prepare($this->_query->query());

        if(!empty($this->_query->valores()))
        {
            $x=1;
            foreach ($this->_query->valores() as $value)
            {
                $consulta->bindValue($x,$value);
                $x++;	
            }
        }			

        try
        {
            $consulta->execute();   
        }
        catch(PDOException $e)
        {
            throw new ConsultaException("Error al procesar la consulta");
        }

        return $consulta;		
	}
}