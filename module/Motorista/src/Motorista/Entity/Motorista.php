<?php
namespace Motorista\Entity;

use Doctrine\ORM\Mapping as ORM;
use Veiculo\Entity\Veiculo;
use Base\Entity\AbstractEntity;

/**
 * Motorista
 * 
 * @ORM\Entity
 * @ORM\Table(name="motorista")
 * @ORM\Entity(repositoryClass="Motorista\Entity\MotoristaRepository")
 */
class Motorista extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $rg;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telefone;

    /**
     * @ORM\ManyToOne(targetEntity="Veiculo\Entity\Veiculo")
     * @ORM\JoinColumn(name="veiculo_id", referencedColumnName="id", nullable=true)
     */
    private $veiculo;

    // Getters e setters para cada propriedade

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getRg(): ?string
    {
        return $this->rg;
    }

    public function setRg(string $rg): self
    {
        $this->rg = $rg;
        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getVeiculo(): ?Veiculo
    {
        return $this->veiculo;
    }

    public function setVeiculo(?Veiculo $veiculo): self
    {
        $this->veiculo = $veiculo;
        return $this;
    }
}
