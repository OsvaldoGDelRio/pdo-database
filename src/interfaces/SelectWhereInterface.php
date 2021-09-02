<?php
namespace src\interfaces;

use src\interfaces\SelectInterface;
use src\interfaces\WhereInterface;

interface SelectWhereInterface
{
    public function __construct(SelectInterface $selectInterface, WhereInterface $whereInterface);
    public function sql(): string;
    public function datos(): array;
}