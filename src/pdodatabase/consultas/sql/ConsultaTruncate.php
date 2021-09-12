<?php
namespace src\pdodatabase\consultas\sql;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\sentencias\sql\SentenciaTruncate;

class ConsultaTruncate
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaSinDatos $ejecutarConsultaSinDatos, SentenciaTruncate $SentenciaTruncate)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaTruncate;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia->sql());
    }
}