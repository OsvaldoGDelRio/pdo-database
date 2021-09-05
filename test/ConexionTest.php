<?php
declare(strict_types=1);
namespace test;

use Exception;
use PDO;
use \PHPUnit\Framework\TestCase;
use src\excepciones\ConexionABaseDeDatosException;
use src\pdodatabase\conexion\BaseDeDatos;
use src\pdodatabase\conexion\ConexionBaseDeDatos;
use src\pdodatabase\conexion\ContrasenaBaseDeDatos;
use src\pdodatabase\conexion\HostBaseDeDatos;
use src\pdodatabase\conexion\UsuarioBaseDeDatos;

class ConexionTest extends TestCase
{
    //Base de datos

    public function testBaseDeDatosNoPuedeEstarVacia()
    {
        $this->expectException(Exception::class);
        $base = new BaseDeDatos('');
    }

    public function testBaseDeDatosSoloDevuelveString()
    {
        $base = new BaseDeDatos('test');
        $this->assertIsString($base->baseDeDatos());
    }

    //Contrasena

    public function testContrasenaSoloDevuelveString()
    {
        $base = new ContrasenaBaseDeDatos('23');
        $this->assertIsString($base->contrasenaBaseDeDatos());
    }

    //Host

    public function testHostBaseDeDatosNoPuedeEstarVacia()
    {
        $this->expectException(Exception::class);
        $base = new HostBaseDeDatos('');
    }

    public function testHostSoloDevuelveString()
    {
        $base = new HostBaseDeDatos('23');
        $this->assertIsString($base->hostBaseDeDatos());
    }

    // usuario

    public function testUsuarioBaseDeDatosNoPuedeEstarVacia()
    {
        $this->expectException(Exception::class);
        $base = new UsuarioBaseDeDatos('');
    }

    public function testUsuarioSoloDevuelveString()
    {
        $base = new UsuarioBaseDeDatos('23');
        $this->assertIsString($base->usuarioBaseDeDatos());
    }

    public function testConexionDevuelveObjetoPDO()
    {
        $con = new ConexionBaseDeDatos(
            new HostBaseDeDatos('127.0.0.1'),
            new BaseDeDatos('test'),
            new UsuarioBaseDeDatos('root'),
            new ContrasenaBaseDeDatos('')
        );

        $this->assertInstanceOf(PDO::class, $con->conectar());
    }

    public function testConexionDevuelveExceptionSiFallaAlConectar()
    {
        $this->expectException(ConexionABaseDeDatosException::class);
        $con = new ConexionBaseDeDatos(
            new HostBaseDeDatos('127.0.0.1'),
            new BaseDeDatos('test'),
            new UsuarioBaseDeDatos('root'),
            new ContrasenaBaseDeDatos('CONTRASEÑAERRONEA')
        );
    }
}