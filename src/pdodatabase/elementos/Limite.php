<?php
namespace src\pdodatabase\elementos;

use Exception;
use src\interfaces\OrdenOLimiteInterface;

class Limite implements OrdenOLimiteInterface
{
    private $_limite;

    public function __construct(string $limite)
    {
        $this->_limite = $this->setOrden($limite);
    }

    public function sql(): string
    {
        return 'LIMIT '. $this->_limite;
    }

    private function setOrden(string $limite): string
    {
        $this->estaVacio($limite);
        $this->esNumero($limite);

        return $limite;
    }

    private function estaVacio(string $limite): void
    {
        if(empty($limite))
        {
            throw new Exception("La sentencia LIMIT no puede estar vacía");
            
        }
    }

    private function esNumero(string $limite): void
    {
        if(!is_numeric($limite))
        {
            throw new Exception("El límite solo pueder número en LIMIT");
        }
    }
}