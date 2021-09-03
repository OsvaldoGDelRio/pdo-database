<?php
namespace src\interfaces;

interface ValidadorDeParametrosInterface
{
    public function __construct(array $datos);
    public function datos(): array;
}