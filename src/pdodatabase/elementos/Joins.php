<?php
namespace src\pdodatabase\elementos;

use src\pdodatabase\elementos\Tabla;
use src\pdodatabase\elementos\Campos;

class Joins
{
    private $_joins;
    private $_tabla;
    private $_campos;

    public function __construct(Tabla $Tabla, Campos $Campos, array $Joins)
    {
        $this->_joins = $Joins;
        $this->_tabla = $Tabla;
        $this->_campos = $this->setCampos($Campos->sql());
        
    }

    public function sql(): string
    {
        $sql = '';

        foreach ($this->_joins as $join)
        {
            $sql = $sql.' '.$join->sql();
        }

        return $this->_campos.','.$this->campos(). ' FROM '. $this->_tabla->sql().$sql;
    }

    private function campos(): string
    {
        $campos = '';

        foreach ($this->_joins as $join)
        {
            $campos = $campos.$join->campos().',';
        }

        return trim($campos,',');
    }

    private function setCampos(string $campos): string
    {
        $campos = str_replace(',',','.$this->_tabla->sql().'.',$campos);

        return $this->_tabla->sql().'.'.$campos;
    }
}