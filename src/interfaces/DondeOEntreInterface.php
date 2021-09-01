<?php
namespace src\interfaces;

interface DondeOEntreInterface
{
    public function __construct(array $Donde);
    public function donde(): string;
    public function datos(): array;
}