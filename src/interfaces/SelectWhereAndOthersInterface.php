<?php
namespace src\interfaces;

use src\interfaces\SelectInterface;
use src\interfaces\WhereAndOthersInterface;

interface SelectWhereAndOthersInterface
{
    public function __construct(SelectInterface $selectInterface, WhereAndOthersInterface $whereAndOthersInterface);
    public function sql(): string;
    public function datos(): array;
}