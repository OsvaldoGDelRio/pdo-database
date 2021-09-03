<?php
namespace src\interfaces;

use src\interfaces\ValidadorDeParametrosInterface;

interface WhereInterface
{
    public function __construct(ValidadorDeParametrosInterface $ValidadorDeParametrosInterface);
    public function sql(): string;
    public function datos(): array;
}