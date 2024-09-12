<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

abstract class AbstractController extends AbstractActionController
{
    protected $em;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;

    abstract function __construct();

    public function indexAction()
    {
        $list = $this->getEm()->getRepository($this->entity)->findAll();

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(10);

        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(['data' => $paginator, 'page' => $page, 'success' => $this->flashMessenger()->getSuccessMessages()]);
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(['data' => $paginator, 'page' => $page, 'error' => $this->flashMessenger()->getErrorMessages()]);
        }

        return new ViewModel(['data' => $paginator, 'page' => $page]);
    }

    public function insertAction()
    {
        if (is_string($this->form)) {
            $form = new $this->form;
        } else {
            $form = $this->form;
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());


            if ($form->isValid()) {
                
                $service = $this->getServiceLocator()->get($this->service);

                if ($service->save($request->getPost()->toArray())) {
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não foi possível cadastrar!');
                }

                return $this->redirect()->toRoute($this->route, ['controller' => $this->controller, 'action' => 'insert']);
            }
        }

        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(['form' => $form, 'success' => $this->flashMessenger()->getSuccessMessages()]);
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(['form' => $form, 'error' => $this->flashMessenger()->getErrorMessages()]);
        }

        $this->flashMessenger()->clearMessages();
        return new ViewModel(['form' => $form]);
    }

    public function updateAction()
    {
        if (is_string($this->form)) {
            $form = new $this->form;
        } else {
            $form = $this->form;
        }

        $request = $this->getRequest();
        $param = $this->params()->fromRoute('id', 0);

        $repository = $this->getEm()->getRepository($this->entity)->find($param);

        if ($repository) {
            if ($request->isPost()) {
                $form->setData($request->getPost());

                if ($form->isValid()) {
                    $service = $this->getServiceLocator()->get($this->service);

                    $data = $request->getPost()->toArray();
                    $data['id'] = (int) $param;

                    if ($service->save($data)) {
                        $this->flashMessenger()->addSuccessMessage('Atualizado com sucesso!');
                    } else {
                        $this->flashMessenger()->addErrorMessage('Não foi possível atualizar!');
                    }

                    return $this->redirect()->toRoute($this->route, ['controller' => $this->controller, 'action' => 'update', 'id' => $param]);
                }
            }
        } else {
            $this->flashMessenger()->addInfoMessage('Registro não foi encontrado!');
            return $this->redirect()->toRoute($this->route, ['controller' => $this->controller]);
        }

        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(['form' => $form, 'success' => $this->flashMessenger()->getSuccessMessages(), 'id' => $param]);
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(['form' => $form, 'error' => $this->flashMessenger()->getErrorMessages(), 'id' => $param]);
        }

        if ($this->flashMessenger()->hasInfoMessages()) {
            return new ViewModel(['form' => $form, 'warning' => $this->flashMessenger()->getInfoMessages(), 'id' => $param]);
        }

        $this->flashMessenger()->clearMessages();
        return new ViewModel(['form' => $form, 'id' => $param]);
    }
    
    public function deleteAction()
    {
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id', 0);
    
        if ($service->remove(['id' => $id])) {
            $this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso!');
        } else {
            $this->flashMessenger()->addErrorMessage('Não foi possível deletar o registro!');
        }
    
        return $this->redirect()->toRoute($this->route, ['controller' => $this->controller]);
    }
    

    public function getEm()
    {
        if ($this->em === null) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }
}
