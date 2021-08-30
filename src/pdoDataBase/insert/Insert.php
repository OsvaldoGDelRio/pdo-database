<?php
namespace src\pdoDataBase\insert;
use src\pdoDataBase\select\Tabla;
use src\pdoDataBase\insert\ValoresAInsertar;

class Insert
{
    private $_tabla;
    private $_valoresAInsertar;

    public function __construct
    (
        Tabla $Tabla,
        ValoresAInsertar $ValoresAInsertar
    )
    {
        $this->_tabla = $Tabla;
        $this->_valoresAInsertar = $ValoresAInsertar;
    }

    public function insert(): string
	{
        $keys = array_keys($this->_valoresAInsertar->valoresAInsertar());
        $values = '';
        
        $x=1;
        foreach($this->_valoresAInsertar->valoresAInsertar() as $field)
        {
            $values.= "?";

            if($x < count($this->_valoresAInsertar->valoresAInsertar()))
            {
                $values.= ', ';
            }

            $x++;
        }

        return "INSERT INTO ". $this->_tabla->tabla()." (`". implode('`, `', $keys) ."`) VALUES ({$values})";
	}
}