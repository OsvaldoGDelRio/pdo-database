<?php
namespace src\pdodatabase\elementos;

use Exception;

class NombreColumnaJoin
{
    private $_tabla1;
    private $_tabla2;

    public function __construct(array $array)
    {
        $this->setDatos($array);
    }

    public function tabla1(): string
    {
        return $this->_tabla1;
    }   

    public function tabla2(): string
    {
        return $this->_tabla2;
    }

    private function setDatos(array $array): void
    {
        $this->estaVacioElArray($array);
        $this->elStringEstaVacio($array);
        $this->tieneMasValores($array);

        if(count($array) == 1)
        {
            $this->_tabla1 = $array[0];
            $this->_tabla2 = $array[0];
        }
        else
        {
            $this->_tabla1 = $array[0];
            $this->_tabla2 = $array[1];
        } 
    }
    
    private function estaVacioElArray(array $array): void
    {
        if(count($array) == 0)
        {
            throw new Exception("Error Processing Request");
            
        }
    }

    private function tieneMasValores(array $array): void
    {
        if(count($array) > 2)
        {
            throw new Exception("Error Processing Request");
            
        }
    }

    private function elStringEstaVacio(array $array): void
    {
        foreach ($array as $value)
        {
            if(empty($value))
            {
                throw new Exception("Error Processing Request");
                
            }
        }
    }
}