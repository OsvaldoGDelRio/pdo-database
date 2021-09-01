<?php
namespace src\interfaces;

use src\pdodatabase\elementos\{Tabla,Campos};

interface SeleccionarInterface
{
    public function __construct(Tabla $Tabla, Campos $Campos);
    public function sql(): string;
}