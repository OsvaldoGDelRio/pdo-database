<?php

/*
Ejemplos de uso
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

use src\pdoDatabase\resultados\{ContarResultados,ResultadoEnObjetos};

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
    'campos' => array('uno'),
    'donde' => array('id','=',1)
));
echo '<h1>Creando consulta con select y Factory</h1>';
var_dump($select);

/*
Creando consulta con Factory
*/