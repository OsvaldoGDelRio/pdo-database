<?php
namespace src\pdodatabase\elementos;

use src\interfaces\WhereInterface;

class Como
{
    private $_where;

    public function __construct(WhereInterface $WhereInterface)
    {
        $this->_where = $WhereInterface;
    }

    public function sql(): string
    {
        return $this->_where->sql();
    }

    public function datos(): array
    {
        return $this->_where->datos();
    } 
}