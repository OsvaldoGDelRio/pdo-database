<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\interfaces\SelectInterface;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;

class Select
{
    private $_ejecutarConsultasSinDatos;
    private $_select;

    public function __construct
    (
        EjecutarConsultaSinDatos $ejecutarConsultaSinDatos,
        SelectInterface $SelectInterface
    )
    {
        $this->_ejecutarConsultasSinDatos = $ejecutarConsultaSinDatos;
        $this->_select = $SelectInterface;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutarConsultasSinDatos->query($this->_select);
    }
}
