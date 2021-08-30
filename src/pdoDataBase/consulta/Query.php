<?php
namespace src\pdoDataBase\consulta;
use Exception;

class Query
{
    private $_sql;
    private $_valores;

    public function __construct(string $sql, ?array $valores = array())
    {
        $this->_sql = $this->setQuery($sql);
        $this->_valores = $this->setValores($valores);
    }

    public function query(): string
    {
        return $this->_sql;
    }

    public function valores(): object
    {
        return $this->_valores;
    }

    private function setQuery(string $sql): string
    {
        if(strlen($sql) < 10)
        {
            throw new Exception("Error en sentencia SQl");       
        }

        return $sql;
    }

    private function setValores(?array $valores = array()): object
    {
        if(!empty($valores))
        {
            $valores = $valores;
        }

        return (object) $valores;
    }
}