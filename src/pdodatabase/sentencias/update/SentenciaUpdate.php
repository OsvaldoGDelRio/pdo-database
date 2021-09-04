<?php
namespace src\pdodatabase\sentencias\update;

use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Update;

class SentenciaUpdate
{
    private $_tabla;
    private $_update;

    public function __construct(Tabla $tabla, Update $update)
    {
        $this->_tabla = $tabla;
        $this->_update = $update;
    }

    public function sql(): string
    {
        return 'UPDATE '.$this->_tabla->sql().' SET '.$this->_update->sql();
    }

    public function datos(): array
    {
        return $this->_update->datos();
    }
}