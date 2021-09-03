<?php
namespace src\pdodatabase\elementos;

use src\interfaces\WhereInterface;
use src\interfaces\ValidadorDeParametrosInterface;

class WhereOr implements WhereInterface
{
    private $_where;
    
    public function __construct(ValidadorDeParametrosInterface $ValidadorDeParametrosInterface)
    {
        $this->_where = $ValidadorDeParametrosInterface->datos();
    }

    public function sql(): string
    {
        return 'WHERE '.$this->_where[0].' '.$this->_where[1].' ? OR '.$this->_where[3].' '.$this->_where[4].' ?';
    }

    public function datos(): array
    {
        return [ $this->_where[2], $this->_where[5] ];
    }
}