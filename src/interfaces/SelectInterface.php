<?php
namespace src\interfaces;

use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Campos;

interface SelectInterface
{
    public function __construct(Tabla $Tabla, Campos $Campos);
    public function sql(): string;
}