<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\WhereInterface;

class Update
{
    private $_datos;
    private $_where;

    public function __construct(array $datos, WhereInterface $whereInterface)
    {
        $this->_datos = $this->setDatos($datos);
        $this->_where = $whereInterface;
    }

    public function sql(): string
    {
        return $this->armarConsulta($this->_datos).' '.$this->_where->sql();
    }

    public function datos(): array
    {
        $array = $this->_datos;

        foreach ($this->_where->datos() as $value)
        {
            array_push($array, $value);
        }

        return $array;
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
        $set = "";

		$values = [];

		foreach ($array as $key => $value)
		{
			$set = $set.$key. ' = ?,';
		}

		return trim($set, ',');  
    }
}