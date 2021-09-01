<?php
namespace src\interfaces;

use src\pdodatabase\elementos\Donde;

interface DondeYDondeInterface
{
    public function __construct(Donde $Donde, Donde $SegundoDonde);
    public function donde(): string;
    public function datos(): array;
}