<?php
declare(strict_types=1);
namespace test;

use Exception;
use PDOStatement;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;

class EjecutarConsultaTest extends TestCase
{
    //class EjecutarConsultaSinDatos 
    public function testEjecutarConsultaSinDatosRegresaPDOStatment()
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $consulta = new EjecutarConsultaSinDatos(
            $conexion    
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->query('SELECT * FROM prueba'));
    } 

    public function testSiEjecutarConsultaSinDatosFallaLanzaExcepcion()
    {

        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $consulta = new EjecutarConsultaSinDatos(
            $conexion    
        );
        $this->expectException(Exception::class);
        $this->assertInstanceOf(PDOStatement::class, $consulta->query('SELECT FROM prueba'));
    } 
}

