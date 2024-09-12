<?php

namespace Veiculo\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class VeiculoService extends AbstractService{

    public function __construct(EntityManager $em)
    {
        $this->entity = 'Veiculo\Entity\Veiculo';
        parent::__construct($em);
    }

}