<?php
namespace src\interfaces;

interface ElementoConParametroInterface
{
    public function __construct(string $string);
    public function parametro(): string;
}