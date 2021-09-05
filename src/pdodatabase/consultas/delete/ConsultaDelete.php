<?php
namespace src\pdodatabase\consultas\delete;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\delete\SentenciaDelete;

class ConsultaDelete
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaDelete $SentenciaDelete)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaDelete;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}