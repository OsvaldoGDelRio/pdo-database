[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/badges/build.png?b=main)](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/build-status/main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/OsvaldoGDelRio/pdo-database/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

# Construyendo

## pdo-database
Clases en PHP para trabajar con PDO y bases de datos SQL escrita en español.

## Instalación

Requiere: PSR-4: Autoloader

### Vía composer
```shell
composer require osvaldogdelrio/pdo-database
```
### Requiere de Factory para un mejor uso aunque puede utilizarse sin este método
```shell
composer require osvaldogdelrio/factory
```

Usarla sin Factory requiere de mucho código que puede llegar a ser abrumador en proyectos que implementan Modelos, Controladores y Vistas, para realizar una conexión de forma tradicional hay que hacer:

```php
$conexion = new ConexionBaseDeDatos(
            new HostBaseDeDatos('127.0.0.1'),
            new BaseDeDatos('test'),
            new UsuarioBaseDeDatos('root'),
            new ContraseñaBaseDeDatos('')
        );
$conexion = $conexion->conectar();

/*
    $conexion Es el objeto PDO con el que interactuará el resto de la librería
*/
```
Para realizarla con Factory y la clase CrearConexionBaseDeDatos

```php
/*
    La clase src/pdodatabase/conexion/CrearConexionBaseDeDatos.php 
    contiene los datos de conexión o se pueden implementar con un require_once 
    o pasarlos por medio del array
*/
$conexion = $factory->crear('CrearConexionBaseDeDatos',[]);

$conexion = $conexion->conectar();
/*
    $conexion Es el objeto PDO con el que interactuará el resto de la librería
*/
```

Para ejecutar un sentencia "SELECT * FROM id WHERE Idusuario = 1" y mostrar los resultados en arrays sin Factory se requiere

```php
$conexion = new ConexionBaseDeDatos(
                new HostBaseDeDatos('127.0.0.1'),
                new BaseDeDatos('test'),
                new UsuarioBaseDeDatos('root'),
                new ContraseñaBaseDeDatos('')
        );

$conexion = $conexion->conectar();

$consulta = new ConsultaSelectWhere(
    new EjecutarConsultaConDatos(
        $conexion
    ),
    new SentenciaSelectWhere(
        new CamposYTabla(
            new Campos($array['*']),
            new Tabla($array['id'])
        ),
        new Como(
            new Where(
                new ValidadorDeParametrosWhere(
                    $array['idusuario','=',1]
                )
            )
        )
    )
);

$resultados = new ResultadoEnArrays;

$resultados = $resultados->resultado($consulta->obtener());

print_r($resultado);

/*
array
*/

```

## Listado de sentencias con código usando Factory

### SELECT
```php
SELECT * FROM prueba
```php
$select = $factory->crear('src\factory\Select',[
    'tabla' => 'prueba',
    'campos' => ['*']
]);
```
SELECT id,uno,dos FROM prueba
```php
$select = $factory->crear('src\factory\Select',[
    'tabla' => 'prueba',
    'campos' => ['id','uno','dos']
]);
```
SELECT * FROM prueba WHERE id = ?
```php
$select = $factory->crear('src\factory\SelectWhere',[
    'tabla' => 'prueba',
    'campos' => ['*'],
    'where' => ['id','=','1']
]);
```
SELECT * FROM prueba WHERE id = ? AND 'uno' != ?
```php
$select = $factory->crear('src\factory\SelectWhereAnd',[
    'tabla' => 'prueba',
    'campos' => ['*'],
    'where' => ['id','=','1','uno','!=','1']
]);
```
SELECT * FROM prueba WHERE id = ? OR 'uno' != ?
```php
$select = $factory->crear('src\factory\SelectWhereOr',[
    'tabla' => 'prueba',
    'campos' => ['*'],
    'where' => ['id','=','1','uno','!=','1']
]);
```
SELECT * FROM prueba WHERE id BETWEEN ? AND ?
```php
$select = $factory->crear('src\factory\SelectWhereBetween',[
    'tabla' => 'prueba',
    'campos' => ['*'],
    'where' => ['id','1','10']
]);
```
SELECT * FROM prueba WHERE id NOT BETWEEN ? AND ?
```php
$select = $factory->crear('src\factory\SelectWhereNotBetween',[
    'tabla' => 'prueba',
    'campos' => ['*'],
    'where' => ['id','1','10']
]);
```

### EJECUTAR LA CONSULTA

Al ejecutar cada consulta que contiene valores tipo WHERE id = ? los valores se aplican por medio de "bindValue"

```php
$select->obtener();
```

### RESULTADOS

Contar los resultados de un select
```php
/*
ejecutamos la consulta
$consulta = $select->obtener();
*/

$resultado = new ContarResultados;
$resultado->contar($consulta);
```

Devuelve objetos
```php
$resultadoObj = new ResultadoEnObjetos;
$resultadoObj->resultado($consulta);
```
Devuelve arrays
```php
$resultadoArray = new ResultadoEnArrays;
$resultadoArray->resultado($consulta);
```
Devuelve string en formato JSON
```php
$resultadoJson = new ResultadoEnJson;
$resultadoJson->resultado($consulta);
```

### Estructura de directorios

```
pdo-database 
+-- src
|   +-- excepciones             //Contiene todas las Excepciones a lanzar 
|   +-- factory                 //Contiene las clases para generar las peticiones a SQL sin mucho código 
|   +-- interfaces              //Contiene las interfaces de todo el proyecto 
|   +-- pdodatabase             //Contiene todas las clases para construir y hacer las peticiones 
|       |   +-- conexion        //Contiene las clases para crear la conexión 
|       |   +-- consultas       //Contiene las clases para realizar las consultas 
|           |   +-- select 
|       |   +-- ejecutar        //Contiene las clases para ejecutar las consultas 
|       |   +-- elementos       //Contiene las clases para construir las sentencias 
|       |   +-- resultados      //Contiene las clases para mostrar resultados 
|       |   +-- sentencias      //Contiene las clases para construir las sentencias en texto 
|           |   +-- select 
+-- test                        //Contiene las pruebas realizadas en PHPUnit 
```
## ejemplos de uso
```php
<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use src\Factory;
use src\pdodatabase\resultados\ContarResultados;
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
```

## PHP Unit

Para ejecutar las pruebas y mostrar en texto con --testdox
```shell
./vendor/bin/phpunit test --testdox
```

La librería tiene pruebas que se prueden encontrar en pdo-database/test. 
Contiene pruebas unitarias para la construcción de:

- Clases necesarias para la conexión 
- Clases de los elementos de creación de la sentencia SQL
- Clases que muestran resultados en distintos formatos

## Idea
La idea principal es lograr encapsular los valores de una sentencia SQL y dejar de usar sentencias IF, SETTERS Y GETTERS que pueden producir comportamientos extraños. Usar Programación Orientada a Objetos, considerando un objeto una sentencia SQL como SELECT * FROM, que debe de permanecer inmutable hasta la destrucción del mismo.

### ¿Por qué tantos objetos y clases pequeños?
Al tratar de programar en OOP a lo largo de mis proyectos personales me he encontrado con el problema de tener que
estar modificando una y otra vez el código por mover una linea en alguna parte, sobre todo cuando se trata de Clases que intercatuan con la Base de Datos. Creando esta estructura intento minimamente realizarla con principios SOLID, tarea bastante dificil, pero siempre se puede ir mejorando. 

Por ejemplo: si se requiere realizar una consulta sencilla como SELECT * FROM 'tabla' ¿para qué cargar clases que manejan componentes con consultas más complejas? o que en la misma clase se pueda realizar select, update, insert, delete, truncate y hasta create? Al final del día realizar un poco más de esfuerzo escribiendo clases que tengan solo una función e inyectarlas en otras para construir una usabilidad más compleja ahorra mucho tiempo y esfuerzo en proyectos que crecen de pequeños a medianos y grandes. 

Los componentes las clases funcionan en su mayoría de forma agnostica a su entorno, es decir, las clases para construir una sentencia SQL funciona sin intercatuar con las clases que generan la conexión, etcétera.   