<?php

namespace Veiculo\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\Digits;

class VeiculoFilter extends InputFilter {
    public function __construct()
    {
        // Placa
        $placa = new Input('placa');
        $placa->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $placa->getValidatorChain()->attach(new NotEmpty());
        $this->add($placa);

        // Renavam (opcional)
        $renavam = new Input('renavam');
        $renavam->setRequired(false)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $this->add($renavam);

        // Modelo
        $modelo = new Input('modelo');
        $modelo->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $modelo->getValidatorChain()->attach(new NotEmpty());
        $this->add($modelo);

        // Marca
        $marca = new Input('marca');
        $marca->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $marca->getValidatorChain()->attach(new NotEmpty());
        $this->add($marca);

        // Ano
        $ano = new Input('ano');
        $ano->setRequired(true)
            ->getValidatorChain()
            ->attach(new Digits())
            ->attach(new NotEmpty());
        $this->add($ano);

        // Cor
        $cor = new Input('cor');
        $cor->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $cor->getValidatorChain()->attach(new NotEmpty());
        $this->add($cor);
    }
}