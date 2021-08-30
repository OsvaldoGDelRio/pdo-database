<?php
namespace src\pdoDataBase\select;

class MasDonde
{
    private $_masdonde;
    private $_datos;

    public function __construct(?array $MasDonde = array())
    {
        $this->_masdonde = $this->setMasDonde($MasDonde);
    }

    public function masdonde(): string
    {
        return $this->_masdonde;
    }

    public function datos()
    {
        return $this->_datos;
    }

    private function setMasDonde(?array $columnas = array()): string
    {
        $MasDonde = '';

        if(count($columnas) == 3)
        {
            $this->_datos = $this->setDatos($columnas);

            $MasDonde = ' AND '.$columnas[0].' '.$columnas[1].' ?';
        }
        
        return $MasDonde;
    }

    private function setDatos(array $columnas)
    {
        return $columnas[2];
    }
}