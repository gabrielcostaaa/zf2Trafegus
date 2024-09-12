<?php
namespace Veiculo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * 
 * Veiculo
 * 
 * @ORM\Entity
 * @ORM\Table(name="veiculo")
 * @ORM\Entity(repositoryClass="Veiculo\Entity\VeiculoRepository")
 */
class Veiculo extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="placa", type="string", length=7, unique=true)
     */
    private $placa;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $renavam;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $modelo;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $marca;

    /**
     * @ORM\Column(type="integer")
     */
    private $ano;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cor;

    // Getters e setters para cada propriedade

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaca(): ?string
    {
        return $this->placa;
    }

    public function setPlaca(string $placa): self
    {
        $this->placa = $placa;
        return $this;
    }

    public function getRenavam(): ?string
    {
        return $this->renavam;
    }

    public function setRenavam(?string $renavam): self
    {
        $this->renavam = $renavam;
        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;
        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;
        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;
        return $this;
    }

    public function getCor(): ?string
    {
        return $this->cor;
    }

    public function setCor(string $cor): self
    {
        $this->cor = $cor;
        return $this;
    }
}

