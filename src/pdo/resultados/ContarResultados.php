<?php
namespace src\pdodatabase\resultados;

use PDOStatement;

class ContarResultados
{
    public function contar(PDOStatement $PDOStatement): int
    {
        return $PDOStatement->rowCount();
    }
}