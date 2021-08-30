[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/badges/build.png?b=main)](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/build-status/main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
# pdo-database
Clase en PHP para trabajar con PDO y bases de datos SQL escrita en español.
La clase permite realizar consultas con:
- Select
- Insert
- Update

## composer
```shell
composer require osvaldogdelrio/pdo-database
```
## ejemplos de uso
```php
<?php

/*
Ejemplos de uso

CONECTANDO A 
HOST: 127.0.01
BASE DE DATOS = prueba
USUARIO = root
TABLA = prueba
CONTRASEÑA = ''

La tabla contiene los campos
id = int (primary key, autoincrement)
uno = int
dos = int
tres = int
*/

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use src\pdoDataBase\conexion\{
    BaseDeDatos,
    ConexionBaseDeDatos,
    ContraseñaBaseDeDatos,
    HostBaseDeDatos,
    UsuarioBaseDeDatos
};

use src\pdoDatabase\consulta\{Consulta, CrearConsulta, Query};

use src\pdoDatabase\resultados\{
    ContarResultados,
    ResultadoEnObjetos,
    ResultadoEnJson,
    ResultadoEnArrays
};
use src\pdoDataBase\select\{
    Select,
    Campos,
    Tabla,
    Donde,
    MasDonde,
    Entre,
    Limite,
    Orden,
    ConsultaConSelect
};

use src\pdoDataBase\insert\{
    Insert,
    ValoresAInsertar,
    ConsultaConInsert
};

use src\pdoDataBase\update\{
    Update,
    ConsultaConUpdate
};

/*
Creando conexion
*/

$conexion = new ConexionBaseDeDatos(
    new HostBaseDeDatos('127.0.0.1'),
    new BaseDeDatos('test'),
    new UsuarioBaseDeDatos('root'),
    new ContraseñaBaseDeDatos('')
);

echo '<h1>Conexión</h1><pre>';
var_dump($conexion->conectar());

$prueba = new Consulta(
    $conexion,
    new Query("SELECT * FROM prueba WHERE id = ?", array('id' => 1))
);
echo '<h1>Consulta sencilla y directa</h1>';
var_dump($prueba->consulta());

echo '<h1>Contando resultads</h1>';
$contar = new ContarResultados;
var_dump($contar->contar($prueba->consulta()));

echo '<h1>Obteniendo resultados en stdClass</h1>';
$resultado = new ResultadoEnObjetos;
var_dump($resultado->resultado($prueba->consulta()));

$donde = new Donde(
    new MasDonde(
        //array('uno','=',1)
    ),
        //array('id','=',1)
);

$sql = new Select(
    new Tabla('prueba'),
    new Campos(),
    $donde,
    new Entre(),
    new Limite(),
    new Orden()
);
echo '<h1>Realizando un select</h1>';
echo $sql->select().'<br>';

$prueba = new Consulta(
    $conexion,
    new Query($sql->select(),$donde->datos())
);
echo '<h1>Obteniendo la consulta de un select</h1>';
var_dump(
    $resultado->resultado(
    $prueba->consulta()
));

/*
Creando consulta SELECT con factory
*/

$selectConFactory = new ConsultaConSelect;

$select = $selectConFactory->crear(array(
    'tabla' => 'prueba',
    //'campos' => array('uno'),
    //'donde' => array('id','=',1)
));

echo '<h1>Creando consulta con select y Factory y retornando resultados en JSON</h1>';
$json = new ResultadoEnJson;
var_dump($json->resultado($select->consulta()));

echo '<h1>Retornando resultados en array</h1>';
$arrays = new ResultadoEnArrays;
var_dump($arrays->resultado($select->consulta()));

echo '<h1>Creando la sentencia SQL insert</h1>';
$insert = new Insert(
    new Tabla('prueba'),
    new ValoresAInsertar(
        array(
            'uno' => 3,
            'dos' => 1,
            'tres'=> 0 
        )
    )
);

var_dump($insert->insert());

echo '<h1>Insertando valores</h1>';

$insertando = new ConsultaConInsert;

$insertando = $insertando->crear(
    array(
        'tabla' => 'prueba',
        'valores' => 
            array(
                'uno' => 3,
                'dos' => 1,
                'tres'=> 0 
            )
    )
);

var_dump($insertando->consulta());
echo '<h1>Retornando la última ID insertada</h1>';
var_dump($insertando->_ultimaIdInsertada);

echo '<h1>Creando sentencia Update</h1>';

$update = new Update(
    new Tabla('prueba'),
    new Donde(
        new MasDonde(array()),
        array(
            'id','=',1
        )
    ),
    new ValoresAInsertar(
        array(
            'uno' => 9999999,
            'dos' => 1111111
        )
    )
);

var_dump($update->update());

echo '<h1>Modificando valores con Update</h1>';
$consultaConUpdate = new ConsultaConUpdate;
$consultaConUpdate = $consultaConUpdate->crear(
    array(
        'tabla' => 'prueba',
        'valores' => array(
            'uno' => 1013334,
            'dos' => 102331
        ),
        'donde' => array(
            'id','=',1
        )
    )
);
var_dump($consultaR = $consultaConUpdate->consulta());

echo '<h1>Viendo cuántas filas afectó (Se requiere cambiar los valore una vez ejecutado para que siga contando, ya que al hacerlo uan vez no modifica de nuevo la columna)</h1>';

var_dump($contar->contar($consultaR));
```