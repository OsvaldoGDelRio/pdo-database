<?php
namespace src\pdoDataBase\select;

class Campos
{
    private $_campos;

    public function __construct(?array $Campos = array())
    {
        $this->_campos = $this->setCampos($Campos);
    }

    public function Campos(): string
    {
        return $this->_campos;
    }

    private function setCampos(?array $columnas = array()): string
    {
        $campos = '';

        if(count($columnas) > 0)
        {
           foreach ($columnas as $campo)
           {
               $campos = $campo.','.$campos;
           }

           $campos = trim($campos, ',');
        }
        else
        {
            $campos = '*';
        }

        return $campos;
    }
}