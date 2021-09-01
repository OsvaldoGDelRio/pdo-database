<?php
declare(strict_types=1);
namespace test;

use Exception;
use \PHPUnit\Framework\TestCase;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Donde;
use src\pdodatabase\elementos\DondeOEntreConOrdenYLimite;
use src\pdodatabase\elementos\DondeOEntreConParametro;
use src\pdodatabase\elementos\DondeYDondeConOrdenYLimite;
use src\pdodatabase\elementos\DondeYDondeConParametro;
use src\pdodatabase\elementos\Entre;
use src\pdodatabase\elementos\Limite;
use src\pdodatabase\elementos\ODonde;
use src\pdodatabase\elementos\Orden;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\YDonde;
use src\pdodatabase\elementos\OrdenConLimite;


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

    //Donde

    public function testSiDondeEstaVacioLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $donde = new Donde([]);
    }

    public function testDondeSoloRetornaTexto()
    {
        $donde = new Donde(['id','=','23']);
        $this->assertIsString($donde->donde());
    }

    public function testElComparadorSoloPuedeSerLogico()
    {
        $this->expectException(Exception::class);
        $donde = new Donde(['id','12','23']);
    }

    public function testLosDatosQueDevuelveSiempreSonArray()
    {
        $donde = new Donde(['id','=','1']);
        $this->assertIsArray($donde->datos());
    }

    //Entre

    public function testSiEntreEstaVacioLanzaExcepcion()
    {
        $this->expectException(Exception::class);
        $Entre = new Entre([]);
    }

    public function testEntreSoloRetornaTexto()
    {
        $Entre = new Entre(['id','45','23']);
        $this->assertIsString($Entre->donde());
    }

    public function testLosDatosQueDevuelveEntreSiempreSonArray()
    {
        $donde = new Entre(['id','1','1']);
        $this->assertIsArray($donde->datos());
    }

    //ODonde

    public function testODondeSoloRetornaTexto()
    {
        $ODonde = new ODonde(
            new Donde(['id','=','1']),
            new Donde(['id','=','2'])
        );

        $this->assertIsString($ODonde->donde());
    }

    public function testLosDatosQueDevuelveODondeSiempreSonArray()
    {
        $donde = new ODonde(
            new Donde(['id','=','1']),
            new Donde(['id','=','2'])
        );
        $this->assertIsArray($donde->datos());
    }

    //YDonde


    public function testYDondeSoloRetornaTexto()
    {
        $YDonde = new YDonde(
            new Donde(['id','=','1']),
            new Donde(['id','=','2'])
        );

        $this->assertIsString($YDonde->donde());
    }

    public function testLosDatosQueDevuelveYDondeSiempreSonArray()
    {
        $donde = new YDonde(
            new Donde(['id','=','1']),
            new Donde(['id','=','2'])
        );
        $this->assertIsArray($donde->datos());
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

    //Donde o Entre con parametro

    public function testDondeOEntreConParametroRetornaString()
    {
        $consulta = new DondeOEntreConParametro(
            new Donde(['id','=',1]),
            new Limite('1')
        );

        $this->assertIsString($consulta->donde());
    }

    //donde o entre con orden y limite

    public function testDondeOEntreConOrdenYLimiteRetornaString()
    {
        $consulta = new DondeOEntreConOrdenYLimite(
            new Donde(['id','=',1]),
            new OrdenConLimite(
                new Orden('id'),
                new Limite('1')
            )
        );

        $this->assertIsString($consulta->donde());
    }

    // donde y donde con parametro

    public function testDondeYDondeConParametroRetornaString()
    {
        $consulta = new DondeYDondeConParametro(
            new YDonde(
            new Donde(['id','=',1]),
            new Donde(['id','=',1])
            ),
            new Limite('1')
        );

        $this->assertIsString($consulta->donde());
    }

    //donde o entre con orden y limite

    public function testDondeYDondeConOrdenYLimiteRetornaString()
    {
        $consulta = new DondeYDondeConOrdenYLimite(
            new YDonde(
                new Donde(['id','=',1]),
                new Donde(['id','=',1])
                ),
            new OrdenConLimite(
                new Orden('id'),
                new Limite('1')
            )
        );

        $this->assertIsString($consulta->donde());
    }
}