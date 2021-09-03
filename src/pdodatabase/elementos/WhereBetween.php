<?php
namespace src\pdodatabase\elementos;

use src\interfaces\WhereInterface;
use src\interfaces\ValidadorDeParametrosInterface;

class WhereBetween implements WhereInterface
{
    private $_where;
    
    public function __construct(ValidadorDeParametrosInterface $ValidadorDeParametrosInterface)
    {
        $this->_where = $ValidadorDeParametrosInterface->datos();
    }

    public function sql(): string
    {
        return 'WHERE BETWEEN '.$this->_where[0].' ? AND ?';
    }

    public function datos(): array
    {
        return [ $this->_where[1], $this->_where[2] ];
    }
}