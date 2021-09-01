<?php
namespace src\interfaces;

use src\interfaces\WhereInterface;
use src\interfaces\SentenciaDeComparacionInterface;

interface WhereAndOthersInterface
{
    public function __construct(WhereInterface $whereInterface, SentenciaDeComparacionInterface $SentenciaDeComparacionInterface);
    public function sql(): string;
    public function datos(): array;
}