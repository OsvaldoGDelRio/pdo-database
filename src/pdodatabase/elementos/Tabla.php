<?php
namespace src\pdodatabase\elementos;

use Exception;

class Tabla
{
    private $_tabla;

    public function __construct(string $Tabla)
    {
        $this->_tabla = $this->setTabla($Tabla);
    }

    public function sql(): string
    {
        return $this->_tabla;
    }

    private function setTabla(string $tabla): string
    {
        if(empty($tabla))
        {
            throw new Exception("Error Processing Request");
        }

        return $tabla;
    }
}