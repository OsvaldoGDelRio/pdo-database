<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\SelectInterface;
use src\interfaces\SelectWhereAndOthersInterface;
use src\interfaces\WhereAndOthersInterface;

class SelectWhereAndOthers implements SelectWhereAndOthersInterface
{
    private $_where;
    private $_select;

    public function __construct(SelectInterface $selectInterface, WhereAndOthersInterface $whereAndOthersInterface)
    {
        $this->_select = $selectInterface;
        $this->_where = $whereAndOthersInterface;
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