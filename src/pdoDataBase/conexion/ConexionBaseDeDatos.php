<?php
namespace src\pdoDataBase\conexion;

use src\excepciones\ConexionABaseDeDatosException;
use PDO;
use PDOException;

class ConexionBaseDeDatos
{
    private $_hostBaseDeDatos;
    private $_baseDeDatos;
    private $_usuarioBaseDeDatos;
    private $_contraseñaBaseDeDatos;

    public function __construct
    (
        HostBaseDeDatos $HostBaseDeDatos,
        BaseDeDatos $BaseDeDatos,
        UsuarioBaseDeDatos $UsuarioBaseDeDatos,
        ContraseñaBaseDeDatos $ContraseñaBaseDeDatos
    )
    {
        $this->_hostBaseDeDatos = $HostBaseDeDatos;
        $this->_baseDeDatos = $BaseDeDatos;
        $this->_usuarioBaseDeDatos = $UsuarioBaseDeDatos;
        $this->_contraseñaBaseDeDatos = $ContraseñaBaseDeDatos;
    }

    public function conectar(): PDO
    {
        try
		{
			$this->_pdo = new PDO('mysql:host='.$this->_hostBaseDeDatos->hostBaseDeDatos().';dbname='.$this->_baseDeDatos->baseDeDatos().';chartset=utf8mb4',$this->_usuarioBaseDeDatos->usuarioBaseDeDatos(),$this->_contraseñaBaseDeDatos->contraseñaBaseDeDatos());
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException)
		{
			throw new ConexionABaseDeDatosException("Error al conectar con base de datos");
		}

        return $this->_pdo;
    }
}