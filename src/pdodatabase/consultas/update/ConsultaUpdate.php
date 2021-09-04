<?php
namespace src\pdodatabase\consultas\update;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\update\SentenciaUpdate;

class ConsultaUpdate
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaUpdate $SentenciaUpdate)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaUpdate;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}