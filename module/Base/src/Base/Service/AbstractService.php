<?php

namespace Base\Service; // Corrigi o separador para barra invertida

use Doctrine\ORM\EntityManager; // Corrigi o namespace para Doctrine ORM EntityManager
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService {
    protected $em;
    protected $entity;

    /**
     * Construtor para receber o EntityManager
     * 
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Método para salvar uma entidade no banco de dados
     * 
     * @param array $data
     * @return mixed
     */
    public function save(array $data = array()) {
        if (isset($data['id'])) {

            $entity = $this->em->getReference($this->entity, $data['id']);

            $hydrator = new ClassMethods();
            $hydrator->hydrate($data, $entity);

        } else {
            $entity = new $this->entity($data); // Corrigi de $this->enitity para $this->entity
        }

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    /**
     * Método para remover uma entidade do banco de dados
     * 
     * @param array $data
     * @return mixed|null
     */
    public function remove(array $data = array()) {
        $entity = $this->em->getRepository($this->entity)->findOneBy($data);

        if ($entity) {
            $this->em->remove($entity);
            $this->em->flush();

            return $entity;
        }

        return null;
    }
}
