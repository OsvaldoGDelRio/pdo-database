<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaConDatos;
use src\pdodatabase\sentencias\select\SentenciaSelectWhereOrdenOLimite;

class ConsultaSelectWhereOrdenOLimite
{
    private $_ejecutar;
    private $_sentencia;
    
    public function __construct(EjecutarConsultaConDatos $ejecutarConsultaSinDatos, SentenciaSelectWhereOrdenOLimite $SentenciaSelectWhereOrdenOLimite)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $SentenciaSelectWhereOrdenOLimite;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia);
    }
}