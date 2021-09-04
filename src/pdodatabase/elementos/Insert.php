<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\InsertInterface;

class Insert implements InsertInterface
{
    private $_where;

    public function __construct(array $datos)
    {
        $this->_where = $this->setDatos($datos);
    }

    public function sql(): string
    {
        return $this->armarConsulta($this->_where);
    }

    public function datos(): array
    {
        return $this->_where;
    }

    private function setDatos(array $array): array
    {
        $this->estaVacio($array);
        $this->columnaVacia($array);

        return $array;
    }

    private function estaVacio(array $array): void
    {
        if (count($array) == 0)
        {
            throw new Exception("Error Processing Request");
        }
    }

    private function columnaVacia(array $array): void
    {
        foreach ($array as $key => $value)
        {
            if(empty($key))
            {
                throw new Exception("Error Processing Request");   
            }
        }
    }

    private function armarConsulta(array $array): string
    {
        $keys = array_keys($array);
        $values = '';
        $x=1;

        foreach($array as $field)
        {
            $values.= "?";

            if($x < count($array))
            {
                $values.= ', ';
            }

            $x++;
        }

        return "(`". implode('`, `', $keys) ."`) VALUES ({$values})";
    }
}