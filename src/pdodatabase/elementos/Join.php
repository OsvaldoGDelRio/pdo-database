<?php
namespace src\pdodatabase\elementos;

use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Campos;
use src\pdodatabase\elementos\NombreColumnaJoin;
use src\pdodatabase\elementos\TipoDeJoin;

class Join
{
    private $_tabla1;
    private $_tabla;
    private $_campos;
    private $_key;
    private $_tipoDeJoin;

    public function __construct(TipoDeJoin $tipoDeJoin, Tabla $tabla1, Tabla $tabla, Campos $Campos, NombreColumnaJoin $nombreColumnaJoin)
    {
        $this->_tipoDeJoin = $tipoDeJoin;
        $this->_tabla1 = $tabla1;
        $this->_tabla = $tabla;
        $this->_campos = $this->setCampos($Campos->sql());
        $this->_key = $nombreColumnaJoin;
    }

    public function sql(): string
    {
        return $this->_tipoDeJoin->sql().' '.$this->_tabla->sql().' ON '.$this->_tabla1->sql().'.'.$this->_key->tabla1().' = '.$this->_tabla->sql().'.'.$this->_key->tabla2();
    }

    public function campos(): string
    {
        return $this->_campos;
    }

    private function setCampos(string $campos): string
    {
        $campos = str_replace(',',','.$this->_tabla->sql().'.',$campos);

        return $this->_tabla->sql().'.'.$campos;
    }

}