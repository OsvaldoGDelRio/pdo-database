<?php
declare(strict_types=1);
namespace test;

use \PHPUnit\Framework\TestCase;
use src\factory\Delete;
use src\factory\DeleteWhereAnd;
use src\factory\DeleteWhereBetween;
use src\factory\DeleteWhereNotBetween;
use src\factory\DeleteWhereOr;
use src\factory\Insert;
use src\factory\Select;
use src\factory\SelectWhere;
use src\factory\SelectWhereAnd;
use src\factory\SelectWhereBetween;
use src\factory\SelectWhereNotBetween;
use src\factory\SelectWhereOr;
use src\factory\Update;
use src\factory\Join;
use src\factory\JoinWhere;
use src\factory\JoinWhereAnd;
use src\factory\JoinWhereBetween;
use src\factory\JoinWhereNotBetween;
use src\factory\JoinWhereOr;
use src\factory\Truncate;
use src\factory\UpdateWhereAnd;
use src\factory\UpdateWhereBetween;
use src\factory\UpdateWhereNotBetween;
use src\factory\UpdateWhereOr;
use src\pdodatabase\consultas\delete\ConsultaDelete;
use src\pdodatabase\consultas\insert\ConsultaInsert;
use src\pdodatabase\consultas\select\ConsultaJoin;
use src\pdodatabase\consultas\select\ConsultaJoinWhere;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\consultas\sql\ConsultaTruncate;
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

    // UpdateWhereAnd
    public function testFactoryUpdateWhereAndDevuelveClaseAdecuada()
    {
        $insert = new UpdateWhereAnd;
        $this->assertInstanceOf(ConsultaUpdate::class, $insert->crear(['tabla' => 'prueba', 'valores' => ['uno' => 12, 'dos' => 22, 'tres' => 333], 'where' => ['id','!=',1,'uno','=',1]]));
    }

    // UpdateWhereOr
    public function testFactoryUpdateWhereOrDevuelveClaseAdecuada()
    {
        $insert = new UpdateWhereOr;
        $this->assertInstanceOf(ConsultaUpdate::class, $insert->crear(['tabla' => 'prueba', 'valores' => ['uno' => 12, 'dos' => 22, 'tres' => 333], 'where' => ['id','!=',1,'uno','=',1]]));
    }

    // UpdateWhereBetween
    public function testFactoryUpdateWhereBetweenDevuelveClaseAdecuada()
    {
        $insert = new UpdateWhereBetween;
        $this->assertInstanceOf(ConsultaUpdate::class, $insert->crear(['tabla' => 'prueba', 'valores' => ['uno' => 12, 'dos' => 22, 'tres' => 333], 'where' => ['id',1,5]]));
    }

    // UpdateWhereNotBetween
    public function testFactoryUpdateWhereNotBetweenDevuelveClaseAdecuada()
    {
        $insert = new UpdateWhereNotBetween;
        $this->assertInstanceOf(ConsultaUpdate::class, $insert->crear(['tabla' => 'prueba', 'valores' => ['uno' => 12, 'dos' => 22, 'tres' => 333], 'where' => ['id',1,5]]));
    }

    //Delete

    public function testFactoryDeleteDevuelveClaseAdecuada()
    {
        $delete = new Delete;
        $this->assertInstanceOf(ConsultaDelete::class, $delete->crear( ['tabla' => 'prueba', 'where' => ['id','=',1] ] ));
    }

    public function testFactoryDeleteWhereAndDevuelveClaseAdecuada()
    {
        $delete = new DeleteWhereAnd;
        $this->assertInstanceOf(ConsultaDelete::class, $delete->crear( ['tabla' => 'prueba', 'where' => ['id','=',1,'id','=',2] ] ));
    }

    public function testFactoryDeleteWhereOrDevuelveClaseAdecuada()
    {
        $delete = new DeleteWhereOr;
        $this->assertInstanceOf(ConsultaDelete::class, $delete->crear( ['tabla' => 'prueba', 'where' => ['id','=',1,'id','=',2] ] ));
    }

    public function testFactoryDeleteWhereBetweenDevuelveClaseAdecuada()
    {
        $delete = new DeleteWhereBetween;
        $this->assertInstanceOf(ConsultaDelete::class, $delete->crear( ['tabla' => 'prueba', 'where' => ['id',1,3] ] ));
    }

    public function testFactoryDeleteWhereNotBetweenDevuelveClaseAdecuada()
    {
        $delete = new DeleteWhereNotBetween;
        $this->assertInstanceOf(ConsultaDelete::class, $delete->crear( ['tabla' => 'prueba', 'where' => ['id',1,100] ] ));
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

    //JoinWhere

    public function testFactoryJoinWhereDevuelveClaseAdecuada()
    {
        $join = new JoinWhere;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1],
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
        
        $this->assertInstanceOf(ConsultaJoinWhere::class,$join->crear($datos));
    }

    //JoinWhereAnd

    public function testFactoryJoinWhereAndDevuelveClaseAdecuada()
    {
        $join = new JoinWhereAnd;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1,'prueba.uno','=',2],
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
        
        $this->assertInstanceOf(ConsultaJoinWhere::class,$join->crear($datos));
    }

    //JoinWhereOr

    public function testFactoryJoinWhereOrDevuelveClaseAdecuada()
    {
        $join = new JoinWhereOr;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1,'prueba.uno','=',2],
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
        
        $this->assertInstanceOf(ConsultaJoinWhere::class,$join->crear($datos));
    }

    //JoinWhereBetween

    public function testFactoryJoinWhereBetweenDevuelveClaseAdecuada()
    {
        $join = new JoinWhereBetween;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id',1,3],
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
        
        $this->assertInstanceOf(ConsultaJoinWhere::class,$join->crear($datos));
    }

    //JoinWhereBetween

    public function testFactoryJoinWhereNotBetweenDevuelveClaseAdecuada()
    {
        $join = new JoinWhereNotBetween;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id',1,3],
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
        
        $this->assertInstanceOf(ConsultaJoinWhere::class,$join->crear($datos));
    }

    //Truncate

    public function testFactoryTruncateDevuelveClaseAdecuada()
    {
        $truncate = new Truncate;        
        $this->assertInstanceOf(ConsultaTruncate::class,$truncate->crear(['tabla'=>'prueba6']));
    }
}