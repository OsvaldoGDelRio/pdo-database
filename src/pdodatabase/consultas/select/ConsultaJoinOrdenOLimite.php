<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\sentencias\select\SentenciaJoinOrdenOLimite;

class ConsultaJoinOrdenOLimite
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaSinDatos $ejecutarConsultaSinDatos, SentenciaJoinOrdenOLimite $Join)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $Join;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia->sql());
    }
}