<?php
namespace src\pdodatabase\elementos;

use Exception;

class TipoDeJoin
{
    private $_tiposValidos = [
        'inner' => 'INNER JOIN',
        'right' => 'RIGHT JOIN',
        'left' => 'LEFT JOIN',
        'full' => 'FULL JOIN'
    ];

    private $_join;

    public function __construct(string $join)
    {
        $this->_join = $this->setJoin($join);
    }

    public function sql(): string
    {
        return $this->_join;
    }

    public function setJoin(string $join): string
    {
        $this->estaVacio($join);
        $this->esValido($join);

        return $this->_tiposValidos[$join];
    }

    private function estaVacio(string $string): void
    {
        if(empty($string))
        {
            throw new Exception("Error Processing Request");
        }
    } 

    private function esValido(string $string): void
    {
        if(!array_key_exists($string, $this->_tiposValidos))
        {
            throw new Exception("Error Processing Request");
        }
    } 
}