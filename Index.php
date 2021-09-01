<?php
declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';


use src\pdodatabase\elementos\Columna;
use src\pdodatabase\elementos\Operador;
use src\pdodatabase\elementos\SentenciaDeComparacionColumnaOperadorValor;
use src\pdodatabase\elementos\SentenciaDeComparacionColumnaValorValor;
use src\pdodatabase\elementos\SentenciaDeComparacionColumnaValorValorNegacion;
use src\pdodatabase\elementos\Valor;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\elementos\WhereAnd;
use src\pdodatabase\elementos\WhereBetween;
use src\pdodatabase\elementos\WhereNotBetween;

$and = new WhereAnd(
    new Where(
        new SentenciaDeComparacionColumnaOperadorValor(
            new Columna('id'),
            new Operador('='),
            new Valor('1')
        )
    ),
    new SentenciaDeComparacionColumnaOperadorValor(
        new Columna('id'),
        new Operador('='),
        new Valor('3')
    )
);


echo $and->sql();
echo '<pre>';
var_dump($and->datos());

$between = new WhereNotBetween(
    new SentenciaDeComparacionColumnaValorValorNegacion(
        new Columna('id'),
        new Valor('1'),
        new Valor('3')
    )
);

echo $between->sql();
var_dump($between->datos());
