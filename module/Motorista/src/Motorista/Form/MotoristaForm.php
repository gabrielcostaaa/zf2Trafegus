<?php

namespace Motorista\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Motorista\Form\MotoristaFilter;
use Zend\Form\Element\Button;
use Zend\Form\Element\Csrf;

class MotoristaForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');
        $this->setInputFilter(new MotoristaFilter());

        // Adicionar um CSRF Token para segurança
        $this->add(new Csrf('csrf'));

        // Nome
        $this->add([
            'name' => 'nome',
            'type' => Text::class,
            'options' => [
                'label' => 'Nome',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 100,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o Nome',
                'required' => 'required',
            ],
        ]);

        // RG
        $this->add([
            'name' => 'rg',
            'type' => Text::class,
            'options' => [
                'label' => 'RG',
                'label_attributes' => [
                    'class' => 'col-sm-3 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 20,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o RG',
                'required' => 'required',
            ],
        ]);

        // CPF
        $this->add([
            'name' => 'cpf',
            'type' => Text::class,
            'options' => [
                'label' => 'CPF',
                'label_attributes' => [
                    'class' => 'col-sm-3 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 14,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o CPF',
                'required' => 'required',
            ],
        ]);

        // Telefone
        $this->add([
            'name' => 'telefone',
            'type' => Text::class,
            'options' => [
                'label' => 'Telefone',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 15,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o Telefone',
                'required' => 'required',
            ],
        ]);

        // Botão de Submit
        $button = new Button('submit');
        $button->setLabel('Salvar')
            ->setAttributes([
                'type' => 'submit',
                'class' => 'btn btn-success margin-top align-right'
            ]);
        $this->add($button);
    }
}
