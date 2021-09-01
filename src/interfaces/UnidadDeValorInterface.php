<?php
namespace src\interfaces;

interface UnidadDeValorInterface
{
    public function __construct(string $valor);
    public function valor(): string;
}