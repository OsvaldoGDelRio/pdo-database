<?php
namespace src\interfaces;

use src\pdodatabase\elementos\{Orden,Limite};

interface OrdenConLimiteInterface
{
    public function __construct(Orden $Orden, Limite $Limite);
    public function parametro(): string;
}