<?php
declare(strict_types=1);

namespace test;

use \PHPUnit\Framework\TestCase;
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
use src\pdodatabase\elementos\ValidadorDeParametrosWhereBetween;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\elementos\WhereNotBetween;
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

class SentenciasTest extends TestCase
{
    //Clase Sentencia Select Where

    public function testSentenciaSelectWhereArrojaStringValido()
    {
        $where = new WhereNotBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );
        
        $como = new Como(
            $where
        );

        $sentencia = new SentenciaSelectWhere(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),$como
        );

        $this->assertSame('SELECT * FROM prueba WHERE NOT BETWEEN id ? AND ?', $sentencia->sql());
    }

    //Clase SentenciaSelect

    public function testSentenciaSelectArrojaStringValido()
    {
        $sentencia = new SentenciaSelect(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
                )
            );

        $this->assertSame('SELECT * FROM prueba', $sentencia->sql());
    }

    //class SentenciaInsert

    public function testSentenciaInsertRetornaStringValido()
    {
        $insert = new Insert(['id' => 1]);
        $sentencia = new SentenciaInsert(
            new Tabla('prueba'),
            $insert
        );
        $this->assertSame('INSERT INTO prueba (`id`) VALUES (?)', $sentencia->sql());
    }

    public function testSentenciaInsertRetornaArraValido()
    {
        $insert = new Insert(['id' => 1]);
        $sentencia = new SentenciaInsert(
            new Tabla('prueba'),
            $insert
        );
        $this->assertArrayHasKey('id', $sentencia->datos());
    }

    //Class SentenciaUpdate

    public function testSentenciaUpdateRetornaStringValido()
    {
        $up = new Update(['uno' => 1,'dos' => 2], new Where(new ValidadorDeParametrosWhere(['id','=',1])));
        $sentencia = new SentenciaUpdate(new Tabla('prueba'),$up);
        
        $this->assertSame('UPDATE prueba SET uno = ?,dos = ? WHERE id = ?', $sentencia->sql());
    }

    public function testSentenciaUpdateRetornaArrayValido()
    {
        $up = new Update(['uno' => 11,'dos' => 2], new Where(new ValidadorDeParametrosWhere(['id','=',1])));
        $sentencia = new SentenciaUpdate(new Tabla('prueba'),$up);
        $v='';
        $c='';

        foreach ($sentencia->datos() as $key => $value)
        {
            $v =  $v.$value;
            $c =  $c.$key;  
        }

        $this->assertSame('1121', $v);
        $this->assertSame('unodos0', $c);
    }

    //Class SentenciaDelete

    public function testSentenciaDeleteArrojaStringValido()
    {
        $del = new Delete(
            new Tabla('prueba'),
            new Where(
                new ValidadorDeParametrosWhere(
                    ['id','=',1]
                )
            )
        );

        $sentencia = new SentenciaDelete(
            $del
        );

        $this->assertSame('DELETE FROM prueba WHERE id = ?', $sentencia->sql());
    }

    public function testSentenciaDeleteArrojaArrayValido()
    {
        $del = new Delete(
            new Tabla('prueba'),
            new Where(
                new ValidadorDeParametrosWhere(
                    ['id','=',1]
                )
            )
        );

        $sentencia = new SentenciaDelete(
            $del
        );

        $this->assertIsArray($sentencia->datos());
    }

    //SentenciaJoin

    public function testSentenciaJoinsDevuelveElStringCorrecto()
    {
        $joins = new Joins(
            new Tabla('TABLA1'),
            new Campos(['*']),
            [
                new Join(
                    new TipoDeJoin('inner'),
                    new Tabla('TABLA1'), 
                    new Tabla('tabla2'), 
                    new Campos(['id', 'dos AS DOS']), 
                    new NombreColumnaJoin(['id1','id2']) 
                )
            ]
        );

        $joins = new SentenciaJoin($joins);

        $this->assertSame("SELECT TABLA1.*,tabla2.dos AS DOS,tabla2.id FROM TABLA1 INNER JOIN tabla2 ON TABLA1.id1 = tabla2.id2",$joins->sql());
    }

    // SentenciaJoinWhere

    public function testSentenciaJoinWhereDevuelveElStringCorrecto()
    {
        $joins = new Joins(
            new Tabla('TABLA1'),
            new Campos(['*']),
            [
                new Join(
                    new TipoDeJoin('inner'),
                    new Tabla('TABLA1'), 
                    new Tabla('tabla2'), 
                    new Campos(['id', 'dos AS DOS']), 
                    new NombreColumnaJoin(['id1','id2']) 
                )
            ]
        );

        $where = new Where(
            new ValidadorDeParametrosWhere(['id','=',1])
        );

        $joins = new SentenciaJoinWhere($joins, $where);

        $this->assertSame("SELECT TABLA1.*,tabla2.dos AS DOS,tabla2.id FROM TABLA1 INNER JOIN tabla2 ON TABLA1.id1 = tabla2.id2 WHERE id = ?",$joins->sql());
    }

    public function testSentenciaJoinWhereDevuelveArray()
    {
        $joins = new Joins(
            new Tabla('TABLA1'),
            new Campos(['*']),
            [
                new Join(
                    new TipoDeJoin('inner'),
                    new Tabla('TABLA1'), 
                    new Tabla('tabla2'), 
                    new Campos(['id', 'dos AS DOS']), 
                    new NombreColumnaJoin(['id1','id2']) 
                )
            ]
        );

        $where = new Where(
            new ValidadorDeParametrosWhere(['id','=',1])
        );

        $joins = new SentenciaJoinWhere($joins, $where);

        $this->assertIsArray($joins->datos());
    }

    //SentenciaSElectOrdenOLimite

    public function testSentenciaSelectOrdenOlimiteDevuelveStringValido()
    {
        $sentencia = new SentenciaSelectOrdenOLimite(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),
            new Orden('id ASC')
        );

        $this->assertSame('SELECT * FROM prueba ORDER BY id ASC', $sentencia->sql());
    }

    //SentenciaSElectWhereOrdenOLimite

    public function testSentenciaSelectWhereOrdenOlimiteDevuelveStringValido()
    {
        $where = new WhereNotBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );
        
        $como = new Como(
            $where
        );

        $sentencia = new SentenciaSelectWhereOrdenOLimite(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),$como,
            new Limite(
                '1'
            )
        );

        $this->assertSame('SELECT * FROM prueba WHERE NOT BETWEEN id ? AND ? LIMIT 1', $sentencia->sql());
    }

    public function testSentenciaSelectWhereOrdenOlimiteDevuelveArrayValido()
    {
        $where = new WhereNotBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );
        
        $como = new Como(
            $where
        );

        $sentencia = new SentenciaSelectWhereOrdenOLimite(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),$como,
            new Limite(
                '1'
            )
        );

        $this->assertIsArray($sentencia->datos());
    }

    //SentenciaJoinOrdenOlLimite

    public function testSentenciaJoinOrdenOLimiteDevuelveElStringCorrecto()
    {
        $joins = new Joins(
            new Tabla('TABLA1'),
            new Campos(['*']),
            [
                new Join(
                    new TipoDeJoin('inner'),
                    new Tabla('TABLA1'), 
                    new Tabla('tabla2'), 
                    new Campos(['id', 'dos AS DOS']), 
                    new NombreColumnaJoin(['id1','id2']) 
                )
            ]
        );

        $joins = new SentenciaJoinOrdenOLimite($joins,new Orden('id ASC'));

        $this->assertSame("SELECT TABLA1.*,tabla2.dos AS DOS,tabla2.id FROM TABLA1 INNER JOIN tabla2 ON TABLA1.id1 = tabla2.id2 ORDER BY id ASC",$joins->sql());
    }

    
    // SentenciaJoinWhereOrdenOLimite

    public function testSentenciaJoinWhereOrdenOLimiteDevuelveElStringCorrecto()
    {
        $joins = new Joins(
            new Tabla('TABLA1'),
            new Campos(['*']),
            [
                new Join(
                    new TipoDeJoin('inner'),
                    new Tabla('TABLA1'), 
                    new Tabla('tabla2'), 
                    new Campos(['id', 'dos AS DOS']), 
                    new NombreColumnaJoin(['id1','id2']) 
                )
            ]
        );

        $where = new Where(
            new ValidadorDeParametrosWhere(['id','=',1])
        );

        $joins = new SentenciaJoinWhereOrdenOLimite($joins, $where, new Limite('2'));

        $this->assertSame("SELECT TABLA1.*,tabla2.dos AS DOS,tabla2.id FROM TABLA1 INNER JOIN tabla2 ON TABLA1.id1 = tabla2.id2 WHERE id = ? LIMIT 2",$joins->sql());
    }

    public function testSentenciaJoinWhereOrdenOLimiteDevuelveArrayCorrecto()
    {
        $joins = new Joins(
            new Tabla('TABLA1'),
            new Campos(['*']),
            [
                new Join(
                    new TipoDeJoin('inner'),
                    new Tabla('TABLA1'), 
                    new Tabla('tabla2'), 
                    new Campos(['id', 'dos AS DOS']), 
                    new NombreColumnaJoin(['id1','id2']) 
                )
            ]
        );

        $where = new Where(
            new ValidadorDeParametrosWhere(['id','=',1])
        );

        $joins = new SentenciaJoinWhereOrdenOLimite($joins, $where, new Limite('2'));

        $this->assertIsArray($joins->datos());
    }

    //SentenciaTruncate

    public function testSentenciaTruncateDevuelveStringValido()
    {
        $truncate = new Truncate(new Tabla('prueba'));
        $truncate = new SentenciaTruncate($truncate);
        $this->assertSame("TRUNCATE TABLE prueba",$truncate->sql());
    }

    //SentenciaSelectWhereOrdenYLimite

    public function testSentenciaSelectWhereOrdenYLimiteDevuelveStringValido()
    {
        $sentencia = new SentenciaSelectWhereOrdenYLimite(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),
            new Como(
                new Where(
                    new ValidadorDeParametrosWhere(['uno','=',2])
                )
            ),
            new OrdenYLimite(
                new Orden('id'),
                new Limite('2')
            )
        );

        $this->assertSame('SELECT * FROM prueba WHERE uno = ? ORDER BY id LIMIT 2',$sentencia->sql());
    }

    public function testSentenciaSelectWhereOrdenYLimiteDevuelveArrayValido()
    {
        $sentencia = new SentenciaSelectWhereOrdenYLimite(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),
            new Como(
                new Where(
                    new ValidadorDeParametrosWhere(['uno','=',2])
                )
            ),
            new OrdenYLimite(
                new Orden('id'),
                new Limite('2')
            )
        );

        $this->assertIsArray($sentencia->datos());
    }

    //SentenciaSelectOrdenYLimite

    public function testSentenciaSelectOrdenYLimiteDevuelveStringValido()
    {
        $sentencia = new SentenciaSelectOrdenYLimite(
            new CamposYTabla(
                new Campos(['*']),
                new Tabla('prueba')
            ),
            new OrdenYLimite(
                new Orden('id'),
                new Limite('3')
            )
            );

        $this->assertSame('SELECT * FROM prueba ORDER BY id LIMIT 3', $sentencia->sql());
    }

    //SentenciaJoinWhereOrdenYLimite

    public function testSentenciaJoinWhereOrdenYLimiteDevuelveStringValido()
    {
        $sentencia = new SentenciaJoinWhereOrdenYLimite(
            new Joins(
                new Tabla('prueba'),
                new Campos(['*']),
                [
                    new Join(
                        new TipoDeJoin('inner'),
                        new Tabla('prueba'),
                        new Tabla('prueba2'),
                        new Campos(['*']),
                        new NombreColumnaJoin(['uno'])
                    )
                ]
            ),
            new Where(
                new ValidadorDeParametrosWhere(['prueba.id','=',1])
            ),
            new OrdenYLimite(
                new Orden('id'),
                new Limite('3')
            )
        );

        $this->assertSame('SELECT prueba.*,prueba2.* FROM prueba INNER JOIN prueba2 ON prueba.uno = prueba2.uno WHERE prueba.id = ? ORDER BY id LIMIT 3',$sentencia->sql());
    }

    public function testSentenciaJoinWhereOrdenYLimiteDevuelveArrayValido()
    {
        $sentencia = new SentenciaJoinWhereOrdenYLimite(
            new Joins(
                new Tabla('prueba'),
                new Campos(['*']),
                [
                    new Join(
                        new TipoDeJoin('inner'),
                        new Tabla('prueba'),
                        new Tabla('prueba2'),
                        new Campos(['*']),
                        new NombreColumnaJoin(['uno'])
                    )
                ]
            ),
            new Where(
                new ValidadorDeParametrosWhere(['prueba.id','=',1])
            ),
            new OrdenYLimite(
                new Orden('id'),
                new Limite('3')
            )
        );

        $this->assertIsArray($sentencia->datos());
    }

    //SentenciaJoinOrdenYLimite

    public function testSentenciaJoinOrdenYLimiteDevuelveStringValido()
    {
        $sentencia = new SentenciaJoinOrdenYLimite(
            new Joins(
                new Tabla('prueba'),
                new Campos(['*']),
                [
                    new Join(
                        new TipoDeJoin('full'),
                        new Tabla('prueba'),
                        new Tabla('prueba2'),
                        new Campos(['*']),
                        new NombreColumnaJoin(['uno'])
                    )
                ]
            ),
            new OrdenYLimite(
                new Orden('id'),
                new Limite('3')
            )
            );

            $this->assertSame('SELECT prueba.*,prueba2.* FROM prueba FULL JOIN prueba2 ON prueba.uno = prueba2.uno ORDER BY id LIMIT 3',$sentencia->sql());
    }
}