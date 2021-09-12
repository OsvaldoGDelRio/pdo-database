<?php
declare(strict_types=1);

namespace test;

use Exception;
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
use src\pdodatabase\elementos\ValidadorDeParametrosWhereAndOthers;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\elementos\WhereAnd;
use src\pdodatabase\elementos\WhereBetween;
use src\pdodatabase\elementos\WhereNotBetween;
use src\pdodatabase\elementos\WhereOr;

class ElementosTest extends TestCase
{
    //Clase Tabla

    public function testSiLaTablaEstaVaciaLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $tabla = new Tabla('');
    }

    public function testTablaSoloRetornaTexto()
    {
        $tabla = new Tabla('Hola');
        $this->assertIsString($tabla->sql());
    }

    //Clase Campos

    public function testSiElCampoEstaVacioLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $campos = new Campos([]);
    }

    public function testSiAlgunoDeLosCamposEstaVacioLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $campos = new Campos(['id','']);
    }

    public function testCamposSoloRetornaTexto()
    {
        $campos = new Campos(['*','78']);
        $this->assertIsString($campos->sql());
    }

    //Clase CamposyTabla

    public function testCamposYTablaDevuelveValorCorrecto()
    {
        $tabla = new Tabla('prueba');
        $campos = new Campos(['a,b,c,d']);

        $camposytabla = new CamposYTabla($campos,$tabla);

        $this->assertSame('a,b,c,d FROM prueba',$camposytabla->sql());
    }

    //Clase ValidadorDeParametrosWhere

    public function testValidadorDeParametrosWhereElArrayNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhere([]);
    }

    public function testValidadorDeParametrosWhereLaColumnaSoloPuedeSerString()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhere([1,'1','2']);
    }

    public function testValidadorDeParametrosWhereNingunCampoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhere(['','1','2']);
    }

    public function testValidadorDeParametrosWhereOperadorValido()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhere(['id','1','2']);
    }

    //Clase ValidadorDeParametrosWhereBetween

    public function testValidadorDeParametrosWhereBetweenElArrayNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereBetween([]);
    }

    public function testValidadorDeParametrosWhereBetweenNoPuedeTenerValoresIguales()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereBetween(['id','1','1']);
    }

    public function testValidadorDeParametrosWhereBetweenLaColumnaSoloPuedeSerString()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereBetween([1,'1','2']);
    }

    public function testValidadorDeParametrosWhereBetweenNingunCampoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereBetween(['','1','2']);
    }

    //Clase Where

    public function testWhereArrojaStringValido()
    {
        $where = new Where(
            new ValidadorDeParametrosWhere(
                ['id','=','21']
            )
            );

        $this->assertSame('WHERE id = ?', $where->sql());
    }

    public function testWhereArrojaArrayEnMetodoDatos()
    {
        $where = new Where(
            new ValidadorDeParametrosWhere(
                ['id','=','21']
            )
            );

        $this->assertIsArray($where->datos());
    }

    //Clase ValidadorDeParametrosWhereAndOthers

    public function testValidadorDeParametrosWhereAndOthersElArrayNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereAndOthers([]);
    }

    public function testValidadorDeParametrosWhereAndOthersLaColumnaSoloPuedeSerString()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereAndOthers([1,'=','2','1','=','2']);
    }

    public function testValidadorDeParametrosWhereAndOthersNingunCampoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereAndOthers(['','1','2','','','']);
    }

    public function testValidadorDeParametrosWhereAndOthersOperadorValido()
    {
        $this->expectException(Exception::class);
        $class = new ValidadorDeParametrosWhereAndOthers(['1','1','2','1','1','1']);
    }

    //Clase Where And

    public function testWhereAndArrojaStringValido()
    {
        $where = new WhereAnd(
            new ValidadorDeParametrosWhereAndOthers(
                ['id','=','21','uno','=','1']
            )
            );

        $this->assertSame('WHERE id = ? AND uno = ?', $where->sql());
    }

    public function testWhereAndArrojaUnArray()
    {
        $where = new WhereAnd(
            new ValidadorDeParametrosWhereAndOthers(
                ['id','=','21','uno','=','1']
            )
            );

        $this->assertIsArray($where->datos());
    }

    //Clase Where Or

    public function testWhereOrArrojaStringValido()
    {
        $where = new WhereOr(
            new ValidadorDeParametrosWhereAndOthers(
                ['id','=','21','uno','=','1']
            )
            );

        $this->assertSame('WHERE id = ? OR uno = ?', $where->sql());
    }

    public function testWhereOrArrojaUnArray()
    {
        $where = new WhereOr(
            new ValidadorDeParametrosWhereAndOthers(
                ['id','=','21','uno','=','1']
            )
            );
            
        $this->assertIsArray($where->datos());
    }

    //Clase Where Between

    public function testWhereBetweenArrojaStringValido()
    {
        $where = new WhereBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );

        $this->assertSame('WHERE BETWEEN id ? AND ?', $where->sql());
    }

    public function testWhereBetweenAndArrojaUnArray()
    {
        $where = new WhereBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );
            
        $this->assertIsArray($where->datos());
    }

    //Clase Where Not Between

    public function testWhereNotBetweenArrojaStringValido()
    {
        $where = new WhereNotBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );

        $this->assertSame('WHERE NOT BETWEEN id ? AND ?', $where->sql());
    }

    public function testWhereNotBetweenAndArrojaUnArray()
    {
        $where = new WhereNotBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );
            
        $this->assertIsArray($where->datos());
    }

    //Clase Como 

    public function testComoArrojaStringValido()
    {
        $where = new WhereNotBetween(
            new ValidadorDeParametrosWhereBetween(
                ['id','1','21']
            )
            );
        
        $como = new Como(
            $where
        );

        $this->assertSame('WHERE NOT BETWEEN id ? AND ?', $como->sql());
    }

    //Class Insert

    public function testInsertNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $insert = new Insert([]);
    }

    public function testInsertNingunoDeLosCamposPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $insert = new Insert(['id' => 1, '' => 2]);
    }

    public function testInsertRetornaStringValido()
    {
        $insert = new Insert(['id' => 1]);
        $this->assertSame('(`id`) VALUES (?)', $insert->sql());
    }

    public function testInsertRetornaArraValido()
    {
        $insert = new Insert( ['id' => 1]);
        $this->assertArrayHasKey('id', $insert->datos());
    }

    

    //Class Update

    public function testUpdateNoPuedeRecibirArrayVacio()
    {
        $this->expectException(Exception::class);
        $up = new Update([], new Where(new ValidadorDeParametrosWhere(['id','=',1])));
    }

    public function testUpdateNingunoDeLosCamposPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $up = new Update(['id' => 1, '' => 2], new Where(new ValidadorDeParametrosWhere(['id','=',1])));
    }

    public function testUpdateRetornaStringValido()
    {
        $up = new Update(['uno' => 1,'dos' => 2], new Where(new ValidadorDeParametrosWhere(['id','=',1])));
        $this->assertSame('uno = ?,dos = ? WHERE id = ?', $up->sql());
    }

    public function testUpdateRetornaArrayValido()
    {
        $up = new Update(['uno' => 11,'dos' => 2], new Where(new ValidadorDeParametrosWhere(['id','=',1])));
        
        $v='';
        $c='';

        foreach ($up->datos() as $key => $value)
        {
            $v =  $v.$value;
            $c =  $c.$key;  
        }

        $this->assertSame('1121', $v);
        $this->assertSame('unodos0', $c);
    }

    
    
    //Clase Delete

    public function testDeleteArrojaStringValido()
    {
        $del = new Delete(
            new Tabla('prueba'),
            new Where(
                new ValidadorDeParametrosWhere(
                    ['id','=',1]
                )
            )
        );

        $this->assertSame('prueba WHERE id = ?', $del->sql());
    }

    public function testDeleteArrojaArrayValido()
    {
        $del = new Delete(
            new Tabla('prueba'),
            new Where(
                new ValidadorDeParametrosWhere(
                    ['id','=',1]
                )
            )
        );

        $this->assertIsArray($del->datos());
    }

    //Join

    public function testJoinDevuelveStringCorrectoSql()
    {
        $join  = new Join(
            new TipoDeJoin('inner'),
            new Tabla('tabla1'),
            new Tabla('tabla2'),
            new Campos(['*']),
            new NombreColumnaJoin(['id'])
        );

        $this->assertSame('INNER JOIN tabla2 ON tabla1.id = tabla2.id', $join->sql());
    }

    public function testJoinDevuelveStringCorrectoCampos()
    {
        $join  = new Join(
            new TipoDeJoin('inner'),
            new Tabla('tabla1'),
            new Tabla('tabla2'),
            new Campos(['id','nombre AS name']),
            new NombreColumnaJoin(['id'])
        );

        $this->assertSame('tabla2.nombre AS name,tabla2.id', $join->campos());
    }

    // NombreColumnaJoin

    public function testNombreColumnaJoinNoPuedeTenerArrayVacio()
    {
        $this->expectException(Exception::class);
        $nom = new NombreColumnaJoin([]);
    }

    public function testNombreColumnaJoinNoPuedeTenerStringVacio()
    {
        $this->expectException(Exception::class);
        $nom = new NombreColumnaJoin(['1','']);
    }

    public function testNombreColumnaJoinNoPuedeTenerMasDe2Valores()
    {
        $this->expectException(Exception::class);
        $nom = new NombreColumnaJoin(['1','2','3']);
    }

    //TipoDeJoin
    
    public function testTipoDeJoinNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $nom = new TipoDeJoin('');
    }

    public function testTipoDeJoinTieneQueSerValido()
    {
        $this->expectException(Exception::class);
        $nom = new TipoDeJoin('lol');
    }

    public function testTipoDEJoinDevuelveStringCorrectoSql()
    {
        $nom = new TipoDeJoin('inner');

        $this->assertSame('INNER JOIN', $nom->sql());
    }

    //Joins

    public function testJoinsDevuelveElStringCorrecto()
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

        $this->assertSame("TABLA1.*,tabla2.dos AS DOS,tabla2.id FROM TABLA1 INNER JOIN tabla2 ON TABLA1.id1 = tabla2.id2",$joins->sql());
    }

    

    //Orden

    public function testOrdenNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $orden = new Orden('');
    }

    public function testOrdenRegresaElStringAdecuado()
    {
        $orden = new Orden('id ASC');
        $this->assertSame('ORDER BY id ASC', $orden->sql());
    }

    //Limite

    public function testLimiteNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $orden = new Limite('');
    }

    public function testLimiteDebeDeSerNumero()
    {
        $this->expectException(Exception::class);
        $orden = new Limite('as');
    }

    public function testLimiteRegresaElStringAdecuado()
    {
        $orden = new Limite('2');
        $this->assertSame('LIMIT 2', $orden->sql());
    }

    //Truncate

    public function testTruncateDevuelveStringValido()
    {
        $truncate = new Truncate(new Tabla('prueba'));
        $this->assertSame("TABLE prueba",$truncate->sql());
    }

    //OrdenYLimite

    public function testOrdenYLimiteDevuelveStringValido()
    {
        $ol = new OrdenYLimite(new Orden('id'), new Limite('1'));

        $this->assertSame('ORDER BY id LIMIT 1',$ol->sql());
    }
}