<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\select\SentenciaJoinWhere;

class ConsultaJoinWhere
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaJoinWhere $sentenciaJoinWhere)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $sentenciaJoinWhere;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}