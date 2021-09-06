<?php
declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

use src\Factory;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\CamposYTabla;
use src\pdodatabase\elementos\Join;
use src\pdodatabase\elementos\Joins;
use src\pdodatabase\elementos\NombreColumnaJoin;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\TipoDeJoin;
use src\pdodatabase\elementos\Update;
use src\pdodatabase\elementos\ValidadorDeParametrosWhere;
use src\pdodatabase\elementos\ValidadorDeParametrosWhereBetween;
use src\pdodatabase\elementos\Where;
use src\pdodatabase\resultados\ContarResultados;
use src\pdodatabase\resultados\ResultadoEnArrays;
use src\pdodatabase\resultados\ResultadoEnJson;
use src\pdodatabase\resultados\ResultadoEnObjetos;

$factory = new Factory;

//Realizando la consulta por medio de Factory

// SELECT * FROM prueba

/*
FROM onlinecustomers AS c
FULL JOIN
orders AS o ON c.customerid = o.customerid

FULL JOIN sales AS s ON o.orderId = s.orderId
*/
$array = [
    [
        'tipo' => 'inner',
        'tabla' => 'tabla2',
        'campos' => ['*'],
        'key' => 'id',
        'join' => 
            [
            'tipo' => 'inner',
            'tabla' => 'tabla3',
            'campos' => ['*'],
            'key' => 'id' 
            ]
    ],
    [
        'tipo' => 'inner',
        'tabla' => 'tabla4',
        'campos' => ['*'],
        'key' => 'id',
    ]
];

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

echo '<br><hr>';
echo $joins->sql();
echo '<br><hr>';