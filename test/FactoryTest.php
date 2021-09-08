<?php
declare(strict_types=1);
namespace test;

use \PHPUnit\Framework\TestCase;
use src\factory\Delete;
use src\factory\Insert;
use src\factory\Select;
use src\factory\SelectWhere;
use src\factory\SelectWhereAnd;
use src\factory\SelectWhereBetween;
use src\factory\SelectWhereNotBetween;
use src\factory\SelectWhereOr;
use src\factory\Update;
use src\factory\Join;
use src\pdodatabase\consultas\delete\ConsultaDelete;
use src\pdodatabase\consultas\insert\ConsultaInsert;
use src\pdodatabase\consultas\select\ConsultaJoin;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\consultas\update\ConsultaUpdate;

class FactoryTest extends TestCase
{
    // Select
    public function testFactorySelectDevuelveClaseAdecuada()
    {
        $select = new Select;
        $this->assertInstanceOf(ConsultaSelect::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*']]));
    }

    // SelectWhere
    public function testFactorySelectWhereDevuelveClaseAdecuada()
    {
        $select = new SelectWhere;
        $this->assertInstanceOf(ConsultaSelectWhere::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*'],'where' => ['id','=',2]]));
    }

    // SelectWhereAnd
    public function testFactorySelectWhereAndDevuelveClaseAdecuada()
    {
        $select = new SelectWhereAnd;
        $this->assertInstanceOf(ConsultaSelectWhere::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*'],'where' => ['id','=',2,'uno','=',9]]));
    }

    // SelectWhereOr
    public function testFactorySelectWhereOrDevuelveClaseAdecuada()
    {
        $select = new SelectWhereOr;
        $this->assertInstanceOf(ConsultaSelectWhere::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*'],'where' => ['id','=',2,'uno','=',9]]));
    }

    // SelectWhereBetween
    public function testFactorySelectWhereBetweenDevuelveClaseAdecuada()
    {
        $select = new SelectWhereBetween;
        $this->assertInstanceOf(ConsultaSelectWhere::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*'],'where' => ['id','1',2]]));
    }

    // SelectWhereNotBetween
    public function testFactorySelectWhereNotBetweenDevuelveClaseAdecuada()
    {
        $select = new SelectWhereNotBetween;
        $this->assertInstanceOf(ConsultaSelectWhere::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*'],'where' => ['id','1',2]]));
    }

    // Insert
    public function testFactoryInsertDevuelveClaseAdecuada()
    {
        $insert = new Insert;
        $this->assertInstanceOf(ConsultaInsert::class, $insert->crear(['tabla' => 'prueba', 'valores' => ['uno' => 12, 'dos' => 22, 'tres' => 333]]));
    }

    // Update
    public function testFactoryUpdateDevuelveClaseAdecuada()
    {
        $insert = new Update;
        $this->assertInstanceOf(ConsultaUpdate::class, $insert->crear(['tabla' => 'prueba', 'valores' => ['uno' => 12, 'dos' => 22, 'tres' => 333], 'where' => ['id','!=',1]]));
    }

    //Delete

    public function testFactoryDeleteDevuelveClaseAdecuada()
    {
        $delete = new Delete;
        $this->assertInstanceOf(ConsultaDelete::class, $delete->crear( ['tabla' => 'prueba', 'where' => ['id','=',1] ] ));
    }

    //Join

    public function testFactoryJoinDevuelveClaseAdecuada()
    {
        $join = new Join;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'join' =>
            [
                [
                    'tipo' => 'inner',
                    'tabla' => 'prueba2',
                    'campos' => ['uno AS columnauno'],
                    'key' => ['uno']
                ],
                [
                    'tipo' => 'inner',
                    'tabla' => 'prueba3',
                    'campos' => ['dos AS columnados'],
                    'key' => ['dos'],
                    'join' =>
                    [
                        [
                            'tipo' => 'inner',
                            'tabla' => 'prueba4',
                            'campos' => ['cuatro AS columnacuatro'],
                            'key' => ['cuatro'],
                            'join' => 
                            [
                                [
                                    'tipo' => 'inner',
                                    'tabla' => 'prueba5',
                                    'campos' => ['cinco AS columnacinco'],
                                    'key' => ['cinco']
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        
        $this->assertInstanceOf(ConsultaJoin::class,$join->crear($datos));
    }
}