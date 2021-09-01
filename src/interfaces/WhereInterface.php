<?php
namespace src\interfaces;

use src\interfaces\SentenciaDeComparacionInterface;

interface WhereInterface
{
    public function __construct(SentenciaDeComparacionInterface $sentenciaDeComparacionInterface);
    public function sql(): string;
    public function datos(): array;
}