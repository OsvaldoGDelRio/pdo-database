<?php
namespace src\pdodatabase\conexion;

use src\excepciones\ConexionABaseDeDatosException;
use PDO;
use PDOException;

class ConexionBaseDeDatos
{
    private $_pdo;
    
    public function __construct
    (
        HostBaseDeDatos $HostBaseDeDatos,
        BaseDeDatos $BaseDeDatos,
        UsuarioBaseDeDatos $UsuarioBaseDeDatos,
        ContrasenaBaseDeDatos $ContrasenaBaseDeDatos
    )
    {
        try
		{
			$this->_pdo = new PDO('mysql:host='.$HostBaseDeDatos->hostBaseDeDatos().';dbname='.$BaseDeDatos->baseDeDatos().';chartset=utf8mb4',$UsuarioBaseDeDatos->usuarioBaseDeDatos(),$ContrasenaBaseDeDatos->contrasenaBaseDeDatos());
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException)
		{
			throw new ConexionABaseDeDatosException("Error al conectar con base de datos");
		}
    }

    public function conectar(): PDO
    {
        return $this->_pdo;
    }
}