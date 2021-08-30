<?php
namespace src\pdoDataBase\resultados;

use PDOStatement;

class ContarResultados
{
    public function contar(PDOStatement $PDOStatement): int
    {
        return $PDOStatement->rowCount();
    }
}