<?php
declare(strict_types=1);
namespace test;

use Exception;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\conexion\BaseDeDatos;
use src\pdodatabase\conexion\ContraseñaBaseDeDatos;
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

    //Contraseña

    public function testContraseñaSoloDevuelveString()
    {
        $base = new ContraseñaBaseDeDatos('23');
        $this->assertIsString($base->contraseñaBaseDeDatos());
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
}