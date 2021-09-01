<?php
namespace src\pdodatabase\resultados;

use PDO;
use PDOStatement;
use src\interfaces\ResultadoBaseDeDatosInterface;

class ResultadoEnJson implements ResultadoBaseDeDatosInterface
{
    public function resultado(PDOStatement $PDOStatement): string
    {
        return json_encode($PDOStatement->fetchAll(PDO::FETCH_ASSOC));
    }
}