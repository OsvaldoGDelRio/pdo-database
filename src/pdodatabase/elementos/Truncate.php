<?php
namespace src\pdodatabase\elementos;

use src\pdodatabase\elementos\Tabla;

class Truncate
{
    private $_tabla;

    public function __construct(Tabla $tabla)
    {
        $this->_tabla = $tabla;
    }

    public function sql(): string
    {
        return 'TABLE '.$this->_tabla->sql();
    }
}