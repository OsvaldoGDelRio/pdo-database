<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\sentencias\select\SentenciaSelectOrdenYLimite;

class ConsultaSelectOrdenYLimite
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaSinDatos $ejecutarConsultaSinDatos, SentenciaSelectOrdenYLimite $SentenciaSelectOrdenYLimite)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaSelectOrdenYLimite;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia->sql());
    }
}