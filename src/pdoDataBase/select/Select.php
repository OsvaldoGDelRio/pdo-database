<?php
namespace src\pdoDataBase\select;

use src\pdoDatabase\select\{
    Tabla,
    Campos,
    Donde,
    Entre,
    Limite,
    Orden
};

class Select
{
    private $_tabla;
    private $_campos;
    private $_donde;
    private $_entre;
    private $_limite;
    private $_orden;

    public function __construct
    (
        Tabla $Tabla,
        Campos $Campos,
        Donde $Donde,
        Entre $Entre,
        Limite $Limite,
        Orden $Orden
    )
    {
        $this->_tabla = $Tabla;
        $this->_campos = $Campos;
        $this->_donde = $Donde;
        $this->_entre = $Entre;
        $this->_limite = $Limite;
        $this->_orden = $Orden;
    }

    public function select(): string
    {
        return 
        "SELECT ".$this->_campos->campos().$this->_tabla->tabla().$this->_donde->donde().$this->_entre->entre().$this->_orden->orden().$this->_limite->limite();
    }
}