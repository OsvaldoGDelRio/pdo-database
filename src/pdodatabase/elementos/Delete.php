<?php
namespace src\pdodatabase\elementos;

use src\interfaces\WhereInterface;
use src\pdodatabase\elementos\Tabla;

class Delete
{
    private $_tabla;
    private $_where;

    public function __construct(Tabla $tabla, WhereInterface $whereInterface)
    {
        $this->_tabla = $tabla;
        $this->_where = $whereInterface;
    }

    public function sql(): string
    {
        return $this->_tabla->sql().' '.$this->_where->sql();
    }

    public function datos(): array
    {
        return $this->_where->datos();
    }
}