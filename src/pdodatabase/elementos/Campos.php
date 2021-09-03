<?php
namespace src\pdodatabase\elementos;

use Exception;

class Campos
{
    private $_campos;

    public function __construct(array $array)
    {
        $this->_campos = $this->setCampos($array);
    }

    public function sql(): string
    {
        return $this->_campos;
    }

    private function setCampos(array $array): string
    {
        $this->camposNoEstaVacio($array);

        $campos = '';
        foreach($array as $arr)
        {
            $campos = $arr.','.$campos;
        }

        return trim($campos, ',');
    }

    private function camposNoEstaVacio(array $array): void
    {
        if(count($array) == 0)
        {
            throw new Exception("Error Processing Request");  
        }

        foreach ($array as $value)
        {
            if(empty($value))
            {
                throw new Exception("Error Processing Request");
            }
        }
    }
}