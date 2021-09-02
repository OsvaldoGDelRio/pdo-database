<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\WhereInterface;
use src\interfaces\SelectInterface;
use src\interfaces\SelectWhereInterface;

class SelectWhere implements SelectWhereInterface
{
    private $_where;
    private $_select;

    public function __construct(SelectInterface $selectInterface, WhereInterface $whereInterface)
    {
        $this->_select = $selectInterface;
        $this->_where = $whereInterface;
    }

    public function sql(): string
    {
        return $this->_select->sql().$this->_where->sql();
    }

    public function datos(): array
    {
        return $this->_where->datos();
    }
}
