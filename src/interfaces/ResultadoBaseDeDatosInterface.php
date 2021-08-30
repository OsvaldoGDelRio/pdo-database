<?php
namespace src\interfaces;

use PDOStatement;

interface ResultadoBaseDeDatosInterface
{
    public function resultado(PDOStatement $PDOStatement);
}