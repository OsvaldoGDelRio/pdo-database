<?php
namespace src\pdodatabase\elementos;

use src\interfaces\ValidadorDeParametrosInterface;
use src\interfaces\WhereInterface;

class Where implements WhereInterface
{
    private $_where;
    
    public function __construct(ValidadorDeParametrosInterface $ValidadorDeParametrosInterface)
    {
        $this->_where = $ValidadorDeParametrosInterface->datos();
    }

    public function sql(): string
    {
        return 'WHERE '.$this->_where[0].' '.$this->_where[1].' ?';
    }
    public function datos(): array
    {
        return [$this->_where[2]];
    }
}