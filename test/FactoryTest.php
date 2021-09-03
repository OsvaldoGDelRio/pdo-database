<?php
declare(strict_types=1);
namespace test;

use \PHPUnit\Framework\TestCase;
use src\factory\Select;
use src\factory\SelectWhere;
use src\factory\SelectWhereAnd;
use src\factory\SelectWhereBetween;
use src\factory\SelectWhereNotBetween;
use src\factory\SelectWhereOr;
use src\pdodatabase\consultas\select\ConsultaSelect;
use src\pdodatabase\consultas\select\ConsultaSelectWhere;
use src\pdodatabase\consultas\select\ConsultaSelectWhereAnd;

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

    // SelectWhereBetween
    public function testFactorySelectWhereNotBetweenDevuelveClaseAdecuada()
    {
        $select = new SelectWhereNotBetween;
        $this->assertInstanceOf(ConsultaSelectWhere::class, $select->crear(['tabla' => 'prueba', 'campos' => ['*'],'where' => ['id','1',2]]));
    }
}