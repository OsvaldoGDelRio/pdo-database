<?php
namespace src\interfaces;

use src\interfaces\UnidadDeValorInterface;

interface SentenciaDeComparacionInterface
{
    public function __construct
    (
        UnidadDeValorInterface $UnidadDeValorInterface1,
        UnidadDeValorInterface $UnidadDeValorInterface2,
        UnidadDeValorInterface $UnidadDeValorInterface3
    );

    public function sql(): string;

    public function datos(): array;
}