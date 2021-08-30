<?php
namespace src\pdoDataBase\select;

class Entre
{
    private $_entre;

    public function __construct(?array $Entre = array())
    {
        $this->_entre = $this->setEntre($Entre);
    }

    public function entre(): string
    {
        return $this->_entre;
    }

    private function setEntre(?array $columnas = array()): string
    {
        $Entre = '';

        if(count($columnas) == 3)
        {
            $Entre = ' WHERE '.$columnas[0].' BETWEEN '.$columnas[1].' AND '.$columnas[2];
        }
        
        return $Entre;
    }
}