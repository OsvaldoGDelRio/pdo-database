<?php
namespace src\pdodatabase\consultas\insert;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\insert\SentenciaInsert;

class ConsultaInsert
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaInsert $SentenciaInsert)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaInsert;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}