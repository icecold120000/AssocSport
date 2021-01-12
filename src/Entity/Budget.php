<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BudgetRepository::class)
 */
class Budget
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleBudget;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantInitialBudget;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="budget")
     */
    private $flux;

    public function __construct()
    {
        $this->flux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleBudget(): ?string
    {
        return $this->libelleBudget;
    }

    public function setLibelleBudget(string $libelleBudget): self
    {
        $this->libelleBudget = $libelleBudget;

        return $this;
    }

    public function getMontantInitialBudget(): ?int
    {
        return $this->montantInitialBudget;
    }

    public function setMontantInitialBudget(int $montantInitialBudget): self
    {
        $this->montantInitialBudget = $montantInitialBudget;

        return $this;
    }

    /**
     * @return Collection|Flux[]
     */
    public function getFlux(): Collection
    {
        return $this->flux;
    }

    public function addFlux(Flux $flux): self
    {
        if (!$this->flux->contains($flux)) {
            $this->flux[] = $flux;
            $flux->setBudget($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->flux->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getBudget() === $this) {
                $flux->setBudget(null);
            }
        }

        return $this;
    }
}
