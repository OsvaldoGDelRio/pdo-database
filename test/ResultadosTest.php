<?php
declare(strict_types=1);
namespace test;

use \PHPUnit\Framework\TestCase;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\resultados\ContarResultados;
use src\pdodatabase\resultados\ResultadoEnArrays;
use src\pdodatabase\resultados\ResultadoEnJson;
use src\pdodatabase\resultados\ResultadoEnObjetos;

class ResultadosTest extends TestCase
{
    /**
     * Creando la conexion a Base de datos
     */
    
    public function setUp(): void
    {
        $conexion = new CrearConexionBaseDeDatos;
        $this->conexion = $conexion->crear([]);
    }

    //----------------------------------     OJO------------------------------------------------------
    //La prueba requiere que se pueda conectar a la base de datos y que la tabla exista con registros

    public function testContarResultadosDevuelveEntero()
    {
        $query = $this->conexion->conectar()->query("SELECT * FROM prueba");
        $contar = new ContarResultados;
        $this->assertIsInt($contar->contar($query));
    }

    public function testResultadoObjDevuelveObjetos()
    {
        $query = $this->conexion->conectar()->query("SELECT * FROM prueba");
        $resultado = new ResultadoEnObjetos;
        $this->assertIsObject($resultado->resultado($query));
    }

    public function testResultadoArrayDevuelveArray()
    {
        $query = $this->conexion->conectar()->query("SELECT * FROM prueba");
        $resultado = new ResultadoEnArrays;
        $this->assertIsArray($resultado->resultado($query));
    }

    public function testResultadoJsonDevuelveString()
    {
        $query = $this->conexion->conectar()->query("SELECT * FROM prueba");
        $resultado = new ResultadoEnJson;
        $this->assertIsString($resultado->resultado($query));
    }
}