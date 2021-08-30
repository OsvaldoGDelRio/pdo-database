<?php
namespace src\pdoDataBase\select;

use src\pdoDataBase\select\MasDonde;

class Donde
{
    private $_donde;
    private $_masDonde;
    private $_datos = [];

    public function __construct(MasDonde $MasDonde, ?array $Donde = array())
    {
        $this->_masDonde = $MasDonde;
        $this->_donde = $this->setDonde($Donde);
    }

    public function donde(): string
    {
        return $this->_donde;
    }

    public function datos(): array
    {
        return $this->_datos;
    }

    private function setDonde(?array $columnas = array()): string
    {
        $Donde = '';

        if(count($columnas) == 3)
        {
            $this->_datos = $this->setDatos($columnas);

            $Donde = ' WHERE '.$columnas[0].' '.$columnas[1].' ? '.$this->_masDonde->masdonde();
        }
        
        return $Donde;
    }

    private function setDatos(array $columnas): array
    {
        $array = array($columnas[2]);

        if($this->_masDonde->datos())
        {
            array_push($array, $this->_masDonde->datos());
        }

        return $array;
    }
}