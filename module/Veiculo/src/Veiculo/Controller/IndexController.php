<?php

namespace Veiculo\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController{

    function __construct()
    {
        $this->form = 'Veiculo\Form\VeiculoForm';
        $this->controller = 'veiculo';
        $this->route = 'veiculo/default';
        $this->service = 'Veiculo\Service\VeiculoService';
        $this->entity = 'Veiculo\Entity\Veiculo';
    }

    // public function indexAction()
    // {
    //     return new ViewModel();
    // }

}