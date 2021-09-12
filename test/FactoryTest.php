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
use src\factory\JoinLimit;
use src\factory\JoinOrderBy;
use src\factory\JoinOrderByLimit;
use src\factory\JoinWhere;
use src\factory\JoinWhereAnd;
use src\factory\JoinWhereAndLimit;
use src\factory\JoinWhereAndOrderBy;
use src\factory\JoinWhereAndOrderByLimit;
use src\factory\JoinWhereBetween;
use src\factory\JoinWhereBetweenLimit;
use src\factory\JoinWhereBetweenOrderBy;
use src\factory\JoinWhereBetweenOrderByLimit;
use src\factory\JoinWhereLimit;
use src\factory\JoinWhereNotBetween;
use src\factory\JoinWhereNotBetweenLimit;
use src\factory\JoinWhereNotBetweenOrderBy;
use src\factory\JoinWhereNotBetweenOrderByLimit;
use src\factory\JoinWhereOr;
use src\factory\JoinWhereOrderBy;
use src\factory\JoinWhereOrderByLimit;
use src\factory\JoinWhereOrLimit;
use src\factory\JoinWhereOrOrderBy;
use src\factory\JoinWhereOrOrderByLimit;
use src\factory\SelectLimit;
use src\factory\SelectOrderBy;
use src\factory\SelectOrderByLimit;
use src\factory\SelectWhereAndLimit;
use src\factory\SelectWhereAndOrderBy;
use src\factory\SelectWhereAndOrderByLimit;
use src\factory\SelectWhereBetweenLimit;
use src\factory\SelectWhereBetweenOrderBy;
use src\factory\SelectWhereBetweenOrderByLimit;
use src\factory\SelectWhereLimit;
use src\factory\SelectWhereNotBetweenLimit;
use src\factory\SelectWhereNotBetweenOrderBy;
use src\factory\SelectWhereNotBetweenOrderByLimit;
use src\factory\SelectWhereOrderBy;
use src\factory\SelectWhereOrderByLimit;
use src\factory\SelectWhereOrLimit;
use src\factory\SelectWhereOrOrderBy;
use src\factory\SelectWhereOrOrderByLimit;
use src\factory\Truncate;
use src\factory\UpdateWhereAnd;
use src\factory\UpdateWhereBetween;
use src\factory\UpdateWhereNotBetween;
use src\factory\UpdateWhereOr;
use src\pdodatabase\consultas\delete\ConsultaDelete;
use src\pdodatabase\consultas\insert\ConsultaInsert;
use src\pdodatabase\consultas\select\ConsultaJoin;
use src\pdodatabase\consultas\select\ConsultaJoinOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaJoinOrdenYLimite;
use src\pdodatabase\consultas\select\ConsultaJoinWhere;
use src\pdodatabase\consultas\select\ConsultaJoinWhereOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaJoinWhereOrdenYLimite;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\consultas\select\ConsultaSelectOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaSelectOrdenYLimite;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\consultas\select\ConsultaSelectWhereOrdenOLimite;
use src\pdodatabase\consultas\select\ConsultaSelectWhereOrdenYLimite;
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

    //SelectWhereOrderByLimit

    public function testSelectWhereOrderByLimitDevuelveClaseCorrecta()
    {
        $consulta = new SelectWhereOrderByLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenYLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1],
                'order' => 'id',
                'limit' => '2'
            ]
        ));
    }

    //SelectWhereOrderBy

    public function testSelectWhereOrderByDevuelveClaseCorrecta()
    {
        $consulta = new SelectWhereOrderBy;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1],
                'order' => 'id'
            ]
        ));
    }

     //SelectWhereOrOrderBy

    public function testSelectWhereOrOrderByDevuelveClaseCorrecta()
    {
        $consulta = new SelectWhereOrOrderBy;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1,'uno','=',1],
                'order' => 'id'
            ]
        ));
    }

    //SelectWhereOrOrderByLimit

    public function testSelectWhereOrOrderByLimitDevuelveClaseCorrecta()
    {
        $consulta = new SelectWhereOrOrderByLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenYLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1,'uno','=',1],
                'order' => 'id',
                'limit' => '2'
            ]
        ));
    }

    //SelectWhereOrLimit

    public function testSelectWhereOrLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereOrLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1,'uno','=',1],
                'limit' => '2'
            ]
        ));
    }

    //SelectWhereNotBetweenOrderByLimit

    public function testSelectWhereNotBetweenOrderByLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereNotBetweenOrderByLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenYLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id',1,5],
                'order' => 'id',
                'limit' => '2'
            ]
        ));
    }

    //SelectWhereLimit

    public function testSelectWhereLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereLimit;
        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','=',5],
                'limit' => '1'
            ]
        ));
    }

    //SelectWhereNotBetweenOrderBy

    public function testSelectWhereNotBetweenOrderByDevuelveObjetoValido()
    {
        $consulta = new SelectWhereNotBetweenOrderBy;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id',1,5],
                'order' => 'id'
            ]
        ));
    }

    //SelectWhereNotBetweenLimit
    public function testSelectWhereNotBetweenLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereNotBetweenLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id',1,5],
                'limit' => '5'
            ]
        ));
    }

    //SelectWhereBetweenOrderByLimit

    public function testSelectWhereBetweenOrderByLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereBetweenOrderByLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenYLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id',1,5],
                'order' => 'id',
                'limit' => '2'
            ]
        ));
    }

    //SelectWhereBetweenOrderBy
    public function testSelectWhereBetweenOrderByDevuelveObjetoValido()
    {
        $consulta = new SelectWhereBetweenOrderBy;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id',1,5],
                'order' => 'id'
            ]
        ));
    }

    //SelectWhereBetweenLimit
    public function testSelectWhereBetweenLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereBetweenLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id',1,5],
                'limit' => '3'
            ]
        ));
    }

    //SelectWhereAndOrderBy
    public function testSelectWhereAndOrderByDevuelveObjetoValido()
    {
        $consulta = new SelectWhereAndOrderBy;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1,'uno','=',1],
                'order' => 'id'
            ]
        ));
    }

    //SelectWhereAndOrderByLimit

    public function testSelectWhereAndOrderByLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereAndOrderByLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenYLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1,'uno','=',1],
                'order' => 'id',
                'limit' => '3'
            ]
        ));
    }

    //SelectWhereAndLimit

    public function testSelectWhereAndLimitDevuelveObjetoValido()
    {
        $consulta = new SelectWhereAndLimit;

        $this->assertInstanceOf(ConsultaSelectWhereOrdenOLimite::class,$consulta->crear(
            [
                'tabla'=>'prueba6',
                'campos' => ['*'],
                'where' => ['id','!=',1,'uno','=',1],
                'limit' => '2'
            ]
        ));
    }

    //SelectOrderByLimit
    public function testFactorySelectOrderByLimitDevuelveClaseAdecuada()
    {
        $select = new SelectOrderByLimit;
        $this->assertInstanceOf(ConsultaSelectOrdenYLimite::class, $select->crear([
            'tabla' => 'prueba', 'campos' => ['*'],'order' => 'id','limit' => 2
        ]));
    }

    //SelectOrderBy
    public function testFactorySelectOrderByDevuelveClaseAdecuada()
    {
        $select = new SelectOrderBy;
        $this->assertInstanceOf(ConsultaSelectOrdenOLimite::class, $select->crear([
            'tabla' => 'prueba', 'campos' => ['*'],'order' => 'id'
        ]));
    }

     //SelectLimit
     public function testFactorySelectLimitDevuelveClaseAdecuada()
     {
         $select = new SelectLimit;
         $this->assertInstanceOf(ConsultaSelectOrdenOLimite::class, $select->crear([
             'tabla' => 'prueba', 'campos' => ['*'],'limit' => '2'
         ]));
     }

     //JoinWhereOrderByLimit

    public function testFactoryJoinWhereOrderByLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereOrderByLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1],
            'order' => 'id',
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenYLimite::class,$join->crear($datos));
    }

    //JoinWhereOrderBy

    public function testFactoryJoinWhereOrderByDevuelveClaseAdecuada()
    {
        $join = new JoinWhereOrderBy;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1],
            'order' => 'id',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereOrOrderByLimit

    public function testFactoryJoinWhereOrOrderByLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereOrOrderByLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1,'prueba.id','!=',3],
            'order' => 'id',
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenYLimite::class,$join->crear($datos));
    }

    //JoinWhereOrOrderBy

    public function testFactoryJoinWhereOrOrderByDevuelveClaseAdecuada()
    {
        $join = new JoinWhereOrOrderBy;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1,'prueba.id','!=',3],
            'order' => 'id',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereOrLimit

    public function testFactoryJoinWhereOrLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereOrLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','=',1,'prueba.id','!=',3],
            'limit' => '1',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereNotBetweenOrderByLimit
    public function testFactoryJoinWhereNotBetweenOrderByLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereNotBetweenOrderByLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id',1,4],
            'order' => 'id',
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenYLimite::class,$join->crear($datos));
    }

    //JoinWhereNotBetweenOrderBy
    public function testFactoryJoinWhereNotBetweenOrderByDevuelveClaseAdecuada()
    {
        $join = new JoinWhereNotBetweenOrderBy;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id',1,4],
            'order' => 'id',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereLimit

    public function testFactoryJoinWhereLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id','!=',2],
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereNotBetweenLimit

    public function testFactoryJoinWhereNotBetweenLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereNotBetweenLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['prueba.id',1,4],
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinLimit

    public function testFactoryJoinLimitDevuelveClaseAdecuada()
    {
        $join = new JoinLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinOrdenOLimite::class,$join->crear($datos));
    }

    //JoinOrderBy
    public function testFactoryJoinOrderByDevuelveClaseAdecuada()
    {
        $join = new JoinOrderBy;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'order' => 'id',
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
        
        $this->assertInstanceOf(ConsultaJoinOrdenOLimite::class,$join->crear($datos));
    }

    //JoinOrderByLimit

    public function testFactoryJoinOrderByLimitDevuelveClaseAdecuada()
    {
        $join = new JoinOrderByLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'order' => 'id',
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinOrdenYLimite::class,$join->crear($datos));
    }

    //JoinWhereAndLimit

    public function testFactoryJoinWhereAndLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereAndLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['id','=',2,'uno','=',1],
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereAndOrderBy
    public function testFactoryJoinWhereAndOrderByDevuelveClaseAdecuada()
    {
        $join = new JoinWhereAndOrderBy;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['id','=',2,'uno','=',1],
            'order' => 'id',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereAndOrderByLimit
    public function testFactoryJoinWhereAndOrderByLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereAndOrderByLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['id','=',2,'uno','=',1],
            'order' => 'id',
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenYLimite::class,$join->crear($datos));
    }

    //JoinWhereBetweenLimit

    public function testFactoryJoinWhereBetweenLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereBetweenLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['id',4,3],
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereBetweenOrderBy
    public function testFactoryJoinWhereBetweenOrderByDevuelveClaseAdecuada()
    {
        $join = new JoinWhereBetweenOrderBy;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['id',4,3],
            'order' => 'id',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenOLimite::class,$join->crear($datos));
    }

    //JoinWhereBetweenOrderByLimit
    public function testFactoryJoinWhereBetweenOrderByLimitDevuelveClaseAdecuada()
    {
        $join = new JoinWhereBetweenOrderByLimit;
        $datos = [
            'tabla' => 'prueba',
            'campos' => ['*'],
            'where' => ['id',2,5],
            'order' => 'id',
            'limit' => '2',
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
        
        $this->assertInstanceOf(ConsultaJoinWhereOrdenYLimite::class,$join->crear($datos));
    }

}