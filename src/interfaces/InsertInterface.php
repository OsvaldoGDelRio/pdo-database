<?php
namespace src\interfaces;
interface InsertInterface
{
    public function __construct(array $datos);
    public function sql(): string;
    public function datos(): array;
}