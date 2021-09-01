<?php
declare(strict_types=1);
namespace test;

use Exception;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Columna;
use src\pdodatabase\elementos\Limite;
use src\pdodatabase\elementos\Operador;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\OrdenConLimite;
use src\pdodatabase\elementos\Valor;

class ElementosTest extends TestCase
{
    //Tabla

    public function testSiLaTablaEstaVaciaLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $tabla = new Tabla('');
    }

    public function testTablaSoloRetornaTexto()
    {
        $tabla = new Tabla('Hola');
        $this->assertIsString($tabla->tabla());
    }

    //Campos

    public function testSiElCampoEstaVacioLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $campos = new Campos([]);
    }

    public function testCamposSoloRetornaTexto()
    {
        $campos = new Campos(['*','78']);
        $this->assertIsString($campos->campos());
    }

    //Columna

    public function testLaColumnaNoPuedeEstarVacia()
    {
        $this->expectException(Exception::class);
        $campos = new Columna('');
    }

    public function testLaColumnaSoloRetornaTexto()
    {
        $campos = new Columna('er');
        $this->assertIsString($campos->valor());
    }

    //Operador

    public function testElOperadorNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $campos = new Operador('');
    }

    public function testElOperadorSoloAceptaLosDefinidos()
    {
        $this->expectException(Exception::class);
        $campos = new Operador('()');
    }

    public function testElOperadorSoloRetornaTexto()
    {
        $campos = new Operador('=');
        $this->assertIsString($campos->valor());
    }

    //Valor

    public function testElValorNoPuedeEstarVacio()
    {
        $this->expectException(Exception::class);
        $campos = new Valor('');
    }

    public function testElValorSoloRetornaTexto()
    {
        $campos = new Valor('1');
        $this->assertIsString($campos->valor());
    }
    
    //Orden

    public function testLaSentenciaOrdenNoPuedeEstarVacia()
    {
        $this->expectException(Exception::class);
        $orden = new Orden('');
    }

    public function testLaSentenciaOrdenSoloPiedeRetornarString()
    {
        $orden = new Orden('id');
        $this->assertIsString($orden->parametro());
    }

    //Limite

    public function testLaSentenciaLimiteNoPuedeEstarVacia()
    {
        $this->expectException(Exception::class);
        $orden = new Limite('');
    }

    public function testLaSentenciaLimiteSoloAceptaValoresNumero()
    {
        $this->expectException(Exception::class);
        $orden = new Limite('a');
    }

    public function testLaSentenciaLimiteSoloPuedeRetornarString()
    {
        $orden = new Limite('1');
        $this->assertIsString($orden->parametro());
    }

    //orden y limite

    public function testOrdenYLimiteRetornaString()
    {
        $consulta = new OrdenConLimite(new Orden('id'), new Limite('1'));
        $this->assertIsString($consulta->parametro());
    }
}