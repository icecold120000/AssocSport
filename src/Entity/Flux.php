<?php

namespace App\Entity;

use App\Repository\FluxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FluxRepository::class)
 */
class Flux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantFlux;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFlux;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="fluxes")
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity=TypeFlux::class, inversedBy="flux")
     */
    private $typeFlux;

    /**
     * @ORM\ManyToOne(targetEntity=Evenement::class, inversedBy="fluxes")
     */
    private $evenement;

    /**
     * @ORM\ManyToOne(targetEntity=Budget::class, inversedBy="flux")
     */
    private $budget;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantFlux(): ?int
    {
        return $this->montantFlux;
    }

    public function setMontantFlux(int $montantFlux): self
    {
        $this->montantFlux = $montantFlux;

        return $this;
    }

    public function getDateFlux(): ?\DateTimeInterface
    {
        return $this->dateFlux;
    }

    public function setDateFlux(\DateTimeInterface $dateFlux): self
    {
        $this->dateFlux = $dateFlux;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getTypeFlux(): ?TypeFlux
    {
        return $this->typeFlux;
    }

    public function setTypeFlux(?TypeFlux $typeFlux): self
    {
        $this->typeFlux = $typeFlux;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getBudget(): ?Budget
    {
        return $this->budget;
    }

    public function setBudget(?Budget $budget): self
    {
        $this->budget = $budget;

        return $this;
    }
}
