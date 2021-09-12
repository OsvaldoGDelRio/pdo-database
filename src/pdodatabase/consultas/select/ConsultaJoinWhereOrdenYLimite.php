<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\select\SentenciaJoinWhereOrdenYLimite;

class ConsultaJoinWhereOrdenYLimite
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaJoinWhereOrdenYLimite $SentenciaJoinWhereOrdenYLimite)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaJoinWhereOrdenYLimite;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}