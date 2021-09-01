<?php
namespace src\pdodatabase\elementos;

use Exception;

class Tabla
{
    private $_tabla;

    public function __construct(string $tabla)
    {
        $this->_tabla = $this->setTabla($tabla);
    }

    public function tabla(): string
    {
        return $this->_tabla;
    }

    private function setTabla(string $tabla): string
    {
        if(empty($tabla))
        {
            throw new Exception("La tabla no puede estar vacia");
        }

        return ' '.$tabla;
    }
}