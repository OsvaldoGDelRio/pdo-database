<?php
namespace src\pdoDataBase\resultados;

use PDO;
use PDOStatement;

class ResultadoEnObjetos
{
    public function resultado(PDOStatement $PDOStatement): object
    {
        return (object) $PDOStatement->fetchAll(PDO::FETCH_OBJ);
    }
}