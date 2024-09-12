<?php

namespace Base\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class AbstractEntity
 * 
 * Esta classe fornece uma base comum para todas as entidades, 
 * oferecendo funcionalidades para hidratação e extração de dados.
 */
abstract class AbstractEntity
{
    protected $hydrator;

    /**
     * AbstractEntity constructor.
     *
     * Inicializa o hidrator e, opcionalmente, preenche a entidade com dados.
     *
     * @param array $options Dados para hidratar a entidade (opcional).
     */
    public function __construct(array $options = [])
    {
        $this->hydrator = new ClassMethods();
        $this->exchangeArray($options);
    }

    /**
     * Hidrata a entidade com dados fornecidos.
     *
     * @param array $data Dados para hidratar a entidade.
     * @return $this
     */
    public function exchangeArray(array $data)
    {
        $this->hydrator->hydrate($data, $this);
        return $this;
    }

    /**
     * Extrai os dados da entidade para um array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->hydrator->extract($this);
    }
}
