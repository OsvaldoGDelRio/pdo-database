<?php
namespace src\pdoDataBase\resultados;

use PDO;
use PDOStatement;
use src\interfaces\ResultadoBaseDeDatosInterface;

class ResultadoEnArrays implements ResultadoBaseDeDatosInterface
{
    public function resultado(PDOStatement $PDOStatement): array
    {
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }
}