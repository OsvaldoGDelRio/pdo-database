<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\select\SentenciaSelectWhere;

class ConsultaSelectWhere
{
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaSelectWhere $SentenciaSelectWhere)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaSelectWhere;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}