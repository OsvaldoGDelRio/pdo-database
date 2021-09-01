<?php
namespace src\pdodatabase\elementos;

use src\interfaces\SentenciaDeComparacionInterface;
use src\interfaces\WhereInterface;

class WhereNotBetween implements WhereInterface
{
    private $_sentencia;

    public function __construct(SentenciaDeComparacionInterface $sentenciaDeComparacionInterface)
    {
        $this->_sentencia = $sentenciaDeComparacionInterface;
    }

    public function sql(): string
    {
        return ' WHERE '. $this->_sentencia->sql();
    }

    public function datos(): array
    {
        return $this->_sentencia->datos();
    }
}