<?php
namespace src\pdodatabase\elementos;

use src\interfaces\SentenciaDeComparacionInterface;
use src\interfaces\UnidadDeValorInterface;

class SentenciaDeComparacionColumnaOperadorValor implements SentenciaDeComparacionInterface
{
    private $_primerValor;
    private $_segundoValor;
    private $_tercerValor;

    public function __construct
    (
        UnidadDeValorInterface $UnidadDeValorInterface1,
        UnidadDeValorInterface $UnidadDeValorInterface2,
        UnidadDeValorInterface $UnidadDeValorInterface3
    )
    {
        $this->_primerValor = $UnidadDeValorInterface1;
        $this->_segundoValor = $UnidadDeValorInterface2;
        $this->_tercerValor = $UnidadDeValorInterface3;
    }

    public function sql(): string
    {
        return $this->_primerValor->valor().' '.$this->_segundoValor->valor().' ?';
    }

    public function datos(): array
    {
        return [$this->_tercerValor->valor()];
    } 
}