<?php
declare(strict_types=1);

namespace test;

use Exception;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Como;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereBetween;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereAndOthers;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\elementos\WhereAnd;
use src\pdodatabase\elementos\WhereBetween;
use src\pdodatabase\elementos\WhereNotBetween;
use src\pdodatabase\elementos\WhereOr;
use src\pdodatabase\sentencias\select\SentenciaSelect;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;

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
        new ValidadorDeParametrosWhere([]);
    }

    public function testValidadorDeParametrosWhereLaColumnaSoloPuedeSerString()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhere([1,'1','2']);
    }

    public function testValidadorDeParametrosWhereNingunCampoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhere(['','1','2']);
    }

    //Clase ValidadorDeParametrosWhereBetween

    public function testValidadorDeParametrosWhereBetweenElArrayNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhereBetween([]);
    }

    public function testValidadorDeParametrosWhereBetweenNoPuedeTenerValoresIguales()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhereBetween(['id','1','1']);
    }

    public function testValidadorDeParametrosWhereBetweenLaColumnaSoloPuedeSerString()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhereBetween([1,'1','2']);
    }

    public function testValidadorDeParametrosWhereBetweenNingunCampoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhereBetween(['','1','2']);
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
        new ValidadorDeParametrosWhereAndOthers([]);
    }

    public function testValidadorDeParametrosWhereAndOthersLaColumnaSoloPuedeSerString()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhereAndOthers([1,'=','2','1','=','2']);
    }

    public function testValidadorDeParametrosWhereAndOthersNingunCampoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        new ValidadorDeParametrosWhereAndOthers(['','1','2','','','']);
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
}