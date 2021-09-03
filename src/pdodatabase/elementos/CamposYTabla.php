<?php
namespace src\pdodatabase\elementos;

use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\Tabla;

class CamposYTabla
{
    private $_campos;
    private $_tabla;
    
    public function __construct(Campos $Campos, Tabla $Tabla)
    {
        $this->_campos = $Campos->sql();
        $this->_tabla = $Tabla->sql();
    }

    public function sql(): string
    {       
        return $this->_campos.' FROM '.$this->_tabla;
    }
}
