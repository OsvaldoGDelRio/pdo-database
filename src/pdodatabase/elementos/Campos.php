<?php
namespace src\pdodatabase\elementos;

use Exception;

class Campos
{
    private $_campos;

    public function __construct(array $Campos)
    {
        $this->_campos = $this->setCampos($Campos);
    }

    public function campos(): string
    {
        return $this->_campos;
    }

    private function setCampos(array $columnas): string
    {
        if(count($columnas) == 0)
        {
            throw new Exception("No existen campos indicados");
        }

        $campos = '';
        
        foreach ($columnas as $campo)
        {
            $campos = $campo.','.$campos;
        }

        return $campos = trim($campos, ',');
    }
}