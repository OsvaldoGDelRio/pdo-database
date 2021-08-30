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

use src\pdoDatabase\consulta\{Consulta,Query};

use src\pdoDatabase\resultados\{ContarResultados,ResultadoEnObjetos};

use src\pdoDataBase\select\{
    Select,
    Campos,
    Tabla,
    Donde,
    MasDonde,
    Entre,
    Limite,
    Orden
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

echo '<pre>';
var_dump($conexion->conectar());

$prueba = new Consulta(
    $conexion,
    new Query("SELECT * FROM prueba WHERE id = ?", array('id' => 2))
);

var_dump($prueba->consulta());

$contar = new ContarResultados;
var_dump($contar->contar($prueba->consulta()));

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

echo $sql->select().'<br>';

$prueba = new Consulta(
    $conexion,
    new Query($sql->select(),$donde->datos())
);

var_dump(
    $resultado->resultado(
    $prueba->consulta()
));
