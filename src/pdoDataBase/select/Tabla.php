<?php
namespace src\pdoDataBase\select;
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
        if(strlen($tabla) < 1)
        {
            throw new Exception("La tabla no puede estar vacia");
        }

        return ' '.$tabla;
    }
}