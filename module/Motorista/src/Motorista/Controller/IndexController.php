<?php

namespace Motorista\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController{

    function __construct()
    {
        $this->form = 'Motorista\Form\MotoristaForm';
        $this->controller = 'motorista';
        $this->route = 'motorista/default';
        $this->service = 'Motorista\Service\MotoristaService';
        $this->entity = 'Motorista\Entity\Motorista';
    }

    // public function indexAction()
    // {
    //     return new ViewModel();
    // }

}