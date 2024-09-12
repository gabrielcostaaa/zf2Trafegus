<?php

namespace Motorista\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class MotoristaService extends AbstractService{

    public function __construct(EntityManager $em)
    {
        $this->entity = 'Motorista\Entity\Motorista';
        parent::__construct($em);
    }

}