<?php

namespace App\Entity;

use App\Repository\TypeFluxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeFluxRepository::class)
 */
class TypeFlux
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
    private $libelleTypeFlux;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="typeFlux")
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

    public function getLibelleTypeFlux(): ?string
    {
        return $this->libelleTypeFlux;
    }

    public function setLibelleTypeFlux(string $libelleTypeFlux): self
    {
        $this->libelleTypeFlux = $libelleTypeFlux;

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
            $flux->setTypeFlux($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->flux->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getTypeFlux() === $this) {
                $flux->setTypeFlux(null);
            }
        }

        return $this;
    }
}
