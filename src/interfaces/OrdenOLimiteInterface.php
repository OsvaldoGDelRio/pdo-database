<?php
namespace src\interfaces;

interface OrdenOLimiteInterface
{
    public function __construct(string $ordenolimite);
    public function sql(): string;
}
