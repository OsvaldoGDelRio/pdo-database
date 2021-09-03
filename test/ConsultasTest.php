<?php
declare(strict_types=1);
namespace test;

use PDOStatement;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\select\SentenciaSelect;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;

class ConsultasTest extends TestCase
{
    // class ConsultaSelect

    public function testConsultasSelect()
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $consulta = new ConsultaSelect(
            new EjecutarConsultaSinDatos(
                $conexion
            ),
            new SentenciaSelect(
                new CamposYTabla(
                    new Campos(['*']),
                    new Tabla('prueba')
                )
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    // class ConsultaSelectWhere

    public function testConsultasSelectWhere()
    {
        $conexion = new CrearConexionBaseDeDatos;
        $conexion = $conexion->crear([]);

        $consulta = new ConsultaSelectWhere(
            new EjecutarConsultaConDatos(
                $conexion
            ),
            new SentenciaSelectWhere(
                new CamposYTabla(
                    new Campos(['*']),
                    new Tabla('prueba')
                ),
                new Como(
                    new Where(
                        new ValidadorDeParametrosWhere(
                            ['id','=',12]
                        )
                    )
                )
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }
}

