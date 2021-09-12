<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\sentencias\select\SentenciaSelectOrdenOLimite;

class ConsultaSelectOrdenOLimite
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaSinDatos $ejecutarConsultaSinDatos, SentenciaSelectOrdenOLimite $SentenciaSelectOrdenOLimite)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaSelectOrdenOLimite;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia->sql());
    }
}