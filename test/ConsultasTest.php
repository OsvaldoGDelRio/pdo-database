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
use src\pdodatabase\consultas\select\ConsultaJoinOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaJoinOrdenYLimite;
use src\pdodatabase\consultas\select\ConsultaJoinWhere;
use src\pdodatabase\consultas\select\ConsultaJoinWhereOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaJoinWhereOrdenYLimite;
use src\pdodatabase\consultas\select\ConsultaSelectOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaSelectOrdenYLimite;
use src\pdodatabase\consultas\select\ConsultaSelectWhereOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaSelectWhereOrdenYLimite;
use src\pdodatabase\consultas\sql\ConsultaTruncate;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Delete;
use src\pdodatabase\elementos\Insert;
use src\pdodatabase\elementos\Join;
use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\Limite;
use src\pdodatabase\elementos\NombreColumnaJoin;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\OrdenYLimite;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\TipoDeJoin;
use src\pdodatabase\elementos\Truncate;
use src\pdodatabase\elementos\Update;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\sentencias\delete\SentenciaDelete;
use src\pdodatabase\sentencias\insert\SentenciaInsert;
use src\pdodatabase\sentencias\select\SentenciaJoin;
use src\pdodatabase\sentencias\select\SentenciaJoinOrdenOLimite;
use src\pdodatabase\sentencias\select\SentenciaJoinOrdenYLimite;
use src\pdodatabase\sentencias\select\SentenciaJoinWhere;
use src\pdodatabase\sentencias\select\SentenciaJoinWhereOrdenOLimite;
use src\pdodatabase\sentencias\select\SentenciaJoinWhereOrdenYLimite;
use src\pdodatabase\sentencias\select\SentenciaSelect;
use src\pdodatabase\sentencias\select\SentenciaSelectOrdenOLimite;
use src\pdodatabase\sentencias\select\SentenciaSelectOrdenYLimite;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;
use src\pdodatabase\sentencias\select\SentenciaSelectWhereOrdenOLimite;
use src\pdodatabase\sentencias\select\SentenciaSelectWhereOrdenYLimite;
use src\pdodatabase\sentencias\sql\SentenciaTruncate;
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

    //class ConsultaJoinWhere

    public function testConsultasJoinWhereRetornaObjetoValido()
    {
        $consulta = new ConsultaJoinWhere(
            new EjecutarConsultaConDatos(
                $this->conexion
            ),
            new SentenciaJoinWhere(
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
                        ),
                        new Where(
                            new ValidadorDeParametrosWhere(['prueba.id','=',1])
                        ) 
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaTruncate

    public function testConsultaTruncateDevuelveObjetoValido()
    {
        $consulta = new ConsultaTruncate(
            new EjecutarConsultaSinDatos(
                $this->conexion
            ),
            new SentenciaTruncate(
                new Truncate(
                    new Tabla(
                        'prueba6'
                    )
                )
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }


    //ConsultaSelectOrdenOLimite

    public function testConsultaSelectOrdenOLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaSelectOrdenOLimite(
            new EjecutarConsultaSinDatos(
                $this->conexion
            ),
            new SentenciaSelectOrdenOLimite(
                new CamposYTabla(
                    new Campos(['*']),
                    new Tabla('prueba')
                ),
                new Orden('id ASC')
            )
        );
        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaSelectWhereOrdenOLimite

    public function testConsultaSelectWhereOrdenOLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaSelectWhereOrdenOLimite(
            new EjecutarConsultaConDatos(
                $this->conexion
            ),
            new SentenciaSelectWhereOrdenOLimite(
                new CamposYTabla(
                    new Campos(['*']),
                    new Tabla('prueba')
                ),
                new Como(
                    new Where(
                        new ValidadorDeParametrosWhere(
                            ['id','=',1]
                        )
                    )
                        ),
                        new Limite('2')
            )
                    );
            
        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaJoinOrdenOLimite

    public function testJoinOrdenOLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaJoinOrdenOLimite(
            new EjecutarConsultaSinDatos(
                $this->conexion
            ),
            new SentenciaJoinOrdenOLimite(
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
                        ),
                        new Limite('2') 
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaJoinWhereOrdenOLimite

    public function testConsultaJoinWhereOrdenOLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaJoinWhereOrdenOLimite(
            new EjecutarConsultaConDatos(
                $this->conexion
            ),
            new SentenciaJoinWhereOrdenOLimite(
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
                        ),
                        new Where(
                            new ValidadorDeParametrosWhere(['prueba.id','=',1])
                        ),
                        new Orden('id') 
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }


    //ConsultaSelectOrdenYLimite

    public function testConsultaSelectOrdenYLimitedevuelveObjetoValido()
    {
        $consulta = new ConsultaSelectOrdenYLimite(
            new EjecutarConsultaSinDatos($this->conexion),
            new SentenciaSelectOrdenYLimite(
                new CamposYTabla(
                    new Campos(['*']),
                    new Tabla('prueba')
                ),
                new OrdenYLimite(
                    new Orden('id'),
                    new Limite('2')
                )
            )
                );
        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaSelectWhereOrdenYLimite

    public function testConsultaSelectWhereOrdenYLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaSelectWhereOrdenYLimite(
            new EjecutarConsultaConDatos($this->conexion),
            new SentenciaSelectWhereOrdenYLimite(
                new CamposYTabla(
                    new Campos(['*']),
                    new Tabla('prueba')
                ),
                new Como(
                    new Where(
                        new ValidadorDeParametrosWhere(
                            ['id','!=',2]
                        )
                    )
                ),
                new OrdenYLimite(
                    new Orden('id'),
                    new Limite('2')
                )
            )
                );

                $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaJoinOrdenYLimite

    public function testConsultaJoinOrdenYLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaJoinOrdenYLimite(
            new EjecutarConsultaSinDatos($this->conexion),
            new SentenciaJoinOrdenYLimite(
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
                ),
                new OrdenYLimite(
                    new Orden('id'),
                    new Limite('2')
                )
            )
        );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }

    //ConsultaJoinWhereOrdenYLimite

    public function testConsultaJoinWhereOrdenYLimiteDevuelveObjetoValido()
    {
        $consulta = new ConsultaJoinWhereOrdenYLimite(
            new EjecutarConsultaConDatos($this->conexion),
            new SentenciaJoinWhereOrdenYLimite(
                new Joins(
                    new Tabla('prueba'),
                    new Campos(['*']),
                    [
                        new Join(
                            new TipoDeJoin('inner'),
                            new Tabla('prueba'),
                            new Tabla('prueba2'),
                            new Campos(['id AS id2','uno']),
                            new NombreColumnaJoin(['id'])
                        )
                    ]
                ),
                new Where(
                    new ValidadorDeParametrosWhere(['prueba.id','!=',1])
                ),
                new OrdenYLimite(
                    new Orden('id'),
                    new Limite('2')
                )
            )
            );

        $this->assertInstanceOf(PDOStatement::class, $consulta->obtener());
    }
}

