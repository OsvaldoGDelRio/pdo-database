<?php
namespace src\pdodatabase\consultas\select;

use PDOStatement;
use src\pdodatabase\ejecutar\EjecutarConsultaSinDatos;
use src\pdodatabase\sentencias\select\SentenciaSelect;

class ConsultaSelect
{
    public function __construct(EjecutarConsultaSinDatos $ejecutarConsultaSinDatos, SentenciaSelect $sentenciaSelect)
    {
        $this->_ejecutar = $ejecutarConsultaSinDatos;
        $this->_sentencia = $sentenciaSelect;
    }

    public function obtener(): PDOStatement
    {
        return $this->_ejecutar->query($this->_sentencia->sql());
    }
}