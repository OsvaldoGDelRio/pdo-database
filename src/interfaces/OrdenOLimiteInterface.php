<?php
namespace src\interfaces;

interface OrdenOLimiteInterface
{
    public function __construct(string $string);
    public function parametro(): string;
}