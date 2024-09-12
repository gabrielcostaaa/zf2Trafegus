<?php

namespace Motorista\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\Digits;
use Zend\Validator\Between;

class MotoristaFilter extends InputFilter
{
    public function __construct()
    {
        // Nome
        $nome = new Input('nome');
        $nome->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);

        // RG
        $rg = new Input('rg');
        $rg->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $rg->getValidatorChain()->attach(new NotEmpty());
        $this->add($rg);

        // CPF
        $cpf = new Input('cpf');
        $cpf->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $cpf->getValidatorChain()->attach(new NotEmpty());
        $this->add($cpf);

        // Telefone
        $telefone = new Input('telefone');
        $telefone->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $telefone->getValidatorChain()->attach(new NotEmpty());
        $this->add($telefone);

        // Veículo (opcional)
        // $veiculo = new Input('veiculo');
        // $veiculo->setRequired(false)
        //     ->getFilterChain()
        //     ->attach(new StringTrim())
        //     ->attach(new StripTags());
        // $this->add($veiculo);
    }
}
