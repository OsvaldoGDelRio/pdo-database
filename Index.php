<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use src\Factory;
use src\pdodatabase\resultados\ContarResultados;
use src\pdodatabase\resultados\ResultadoEnArrays;
use src\pdodatabase\resultados\ResultadoEnJson;
use src\pdodatabase\resultados\ResultadoEnObjetos;

$factory = new Factory;

//Realizando la consulta por medio de Factory

// SELECT * FROM prueba

$select = $factory->crear('src\factory\Select',[
    'tabla' => 'prueba',
    'campos' => ['*']
]);

$select = $select->obtener();

/*
Contando los resultados de la consulta
*/

$numeroDeResultados = new ContarResultados;
$numeroDeResultados = $numeroDeResultados->contar($select);

/*
Resultados con la misma consulta
*/

$resultadoObj = new ResultadoEnObjetos;
$resultadoObj->resultado($select);
$resultadoArray = new ResultadoEnArrays;
$resultadoArray->resultado($select);
$resultadoJson = new ResultadoEnJson;
$resultadoJson->resultado($select);