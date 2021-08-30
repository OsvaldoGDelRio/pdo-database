<?php
namespace src\pdoDataBase\resultados;

use PDO;
use PDOStatement;
use src\interfaces\ResultadoBaseDeDatosInterface;

class ResultadoEnObjetos implements ResultadoBaseDeDatosInterface
{
    public function resultado(PDOStatement $PDOStatement): object
    {
        return (object) $PDOStatement->fetchAll(PDO::FETCH_OBJ);
    }
}