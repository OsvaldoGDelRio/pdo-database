<?php
declare(strict_types=1);
namespace test;

use PDOStatement;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\conexion\CrearConexionBaseDeDatos;
use src\pdodatabase\consultas\insert\ConsultaInsert;
use src\pdodatabase\consultas\update\ConsultaUpdate;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\consultas\delete\ConsultaDelete;
use src\pdodatabase\consultas\select\ConsultaJoin;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Delete;
use src\pdodatabase\elementos\Insert;
use src\pdodatabase\elementos\Join;
use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\NombreColumnaJoin;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\TipoDeJoin;
use src\pdodatabase\elementos\Update;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\delete\SentenciaDelete;
use src\pdodatabase\sentencias\insert\SentenciaInsert;
use src\pdodatabase\sentencias\select\SentenciaJoin;
use src\pdodatabase\sentencias\select\SentenciaSelect;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;
use src\pdodatabase\sentencias\update\SentenciaUpdate;

class ConsultasTest extends TestCase
{
    private $conexion;

    public function setUp(): void
    {
        $conexion = new CrearConexionBaseDeDatos;
        $this->conexion = $conexion->crear([]);
    }

    // class ConsultaSelect

    public function testConsultasSelect()
    {

        $consulta = new ConsultaSelect(
            new EjecutarConsultaSinDatos(
                $this->conexion
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
        $consulta = new ConsultaSelectWhere(
            new EjecutarConsultaConDatos(
                $this->conexion
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

    //class ConsultaInsert
    public function testConsultasInsertRetornaObjetoValido()
    {
        $consulta = new ConsultaInsert(
            new EjecutarConsultaConDatos(
                $this->conexion
            ),
            new SentenciaInsert(
                new Tabla('prueba'),
                new Insert(
                    ['uno' => 1, 'dos' => 2, 'tres' => 3]
                )
            )

        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //class ConsultaInsert
    public function testConsultasUpdateRetornaObjetoValido()
    {
        $consulta = new ConsultaUpdate(
            new EjecutarConsultaConDatos(
                $this->conexion
            ),
            new SentenciaUpdate(
                new Tabla('prueba'),
                new Update(
                    ['uno' => 11,'dos' => 2, 'tres' => 1499888],
                    new Where(
                        new ValidadorDeParametrosWhere(['id','=',1])
                    )
                )
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //class ConsultaInsert
    public function testConsultasDeleteRetornaObjetoValido()
    {
        $consulta = new ConsultaDelete(
            new EjecutarConsultaConDatos(
                $this->conexion
            ),
            new SentenciaDelete(
                new Delete(
                    new Tabla('prueba'),
                    new Where(
                        new ValidadorDeParametrosWhere(
                            ['id','=',1]
                        )
                    )
                )
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //class ConsultaJoin
    public function testConsultasJoinRetornaObjetoValido()
    {
        $consulta = new ConsultaJoin(
            new EjecutarConsultaSinDatos(
                $this->conexion
            ),
            new SentenciaJoin(
                new Joins(
                    new Tabla('prueba'),
                    new Campos(['*']),
                    [
                        new Join(
                            new TipoDeJoin('inner'),
                            new Tabla('prueba'),
                            new Tabla('prueba2'),
                            new Campos(['uno AS columna1']),
                            new NombreColumnaJoin(['uno'])
                        )
                    ]
                ) 
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }
}

