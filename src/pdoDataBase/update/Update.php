<?php
namespace src\pdoDataBase\update;

use src\pdoDataBase\select\{
    Tabla,
    Donde
};

use src\pdoDataBase\insert\ValoresAInsertar;

class Update
{
    private $_tabla;
    private $_donde;
    private $_valoresAInsertar;

    public function __construct
    (
        Tabla $Tabla,
        Donde $Donde,
        ValoresAInsertar $ValoresAInsertar
    )
    {
        $this->_tabla = $Tabla;
        $this->_donde = $Donde;
        $this->_valoresAInsertar = $ValoresAInsertar;
    }

    public function update(): string
    {
        $set = "";
		$values = [];

		foreach ($this->_valoresAInsertar->valoresAInsertar() as $key => $value)
		{
			$set = $set. ' ' .$key. ' = ?,';
			array_push($values, $value);
		}

        $valores = trim($set, ',');

        return "UPDATE " . $this->_tabla->tabla(). " SET ".$valores.$this->_donde->donde();
    }
}