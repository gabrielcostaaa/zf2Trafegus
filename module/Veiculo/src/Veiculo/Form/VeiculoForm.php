<?php

namespace Veiculo\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Veiculo\Form\VeiculoFilter;
use Zend\Form\Element\Button;
use Zend\Form\Element\Csrf;

class VeiculoForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');
        $this->setInputFilter(new VeiculoFilter());

        // Adicionar um CSRF Token para segurança
        $this->add(new Csrf('csrf'));

        // Placa
        $this->add([
            'name' => 'placa',
            'type' => Text::class,
            'options' => [
                'label' => 'Placa',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 7,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite a Placa',
                'required' => 'required',
            ],
        ]);

        // Renavam
        $this->add([
            'name' => 'renavam',
            'type' => Text::class,
            'options' => [
                'label' => 'Renavam',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 30,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o Renavam',
                'required' => 'required',
            ],
        ]);

        // Modelo
        $this->add([
            'name' => 'modelo',
            'type' => Text::class,
            'options' => [
                'label' => 'Modelo',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 20,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o Modelo',
                'required' => 'required',
            ],
        ]);

        // Marca
        $this->add([
            'name' => 'marca',
            'type' => Text::class,
            'options' => [
                'label' => 'Marca',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 20,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite a Marca',
                'required' => 'required',
            ],
        ]);

        // Ano
        $this->add([
            'name' => 'ano',
            'type' => Text::class,
            'options' => [
                'label' => 'Ano',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'type' => 'number',
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite o Ano',
                'required' => 'required',
            ],
        ]);

        // Cor
        $this->add([
            'name' => 'cor',
            'type' => Text::class,
            'options' => [
                'label' => 'Cor',
                'label_attributes' => [
                    'class' => 'col-sm-4 control-label'
                ],
            ],
            'attributes' => [
                'maxlength' => 20,
                'class' => 'form-control custom-input',
                'placeholder' => 'Digite a Cor',
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

