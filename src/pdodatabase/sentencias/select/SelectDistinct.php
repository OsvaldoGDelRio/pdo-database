<?php
namespace src\pdodatabase\sentencias\select;

use src\interfaces\SelectInterface;
use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Campos;

class SelectDistinct implements SelectInterface
{
    private $_tabla;
    private $_campos;

    public function __construct(Tabla $Tabla, Campos $Campos)
    {
        $this->_tabla = $Tabla;
        $this->_campos = $Campos;
    }

    public function sql(): string
    {
        return 'SELECT DISTINCT '.$this->_campos->campos().' FROM '.$this->_tabla->tabla().' '; 
    }
}