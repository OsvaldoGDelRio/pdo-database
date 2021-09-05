<?php
declare(strict_types=1);
namespace test;

use Exception;
use PDOStatement;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;

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
    
    public function testSiEjecutarConsultaConDatosFallaLanzaExcepcion()
    {

        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $consulta = new EjecutarConsultaConDatos(
            $conexion    
        );

        $sentencia = new SentenciaSelectWhere(
            new CamposYTabla(
                new Campos(['*']),  //Campos inexistente
                new Tabla('prueba')  //Falla si tiene Tabla inexistente
            ),
            new Como(
                new Where(
                    new ValidadorDeParametrosWhere(
                        ['idsssss','=',1] //Campo inexistente
                    )
                )
            )
        );

        $this->expectException(Exception::class);
        $consulta->query($sentencia);
    } 
}

