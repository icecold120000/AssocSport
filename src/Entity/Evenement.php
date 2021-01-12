<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
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
    private $nomEvenement;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuEvenement;

    /**
     * @ORM\Column(type="integer")
     */
    private $coutEvenement;

    /**
     * @ORM\Column(type="text")
     */
    private $descripEvenement;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageEvenement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vignetteEvenement;

    /**
     * @ORM\ManyToOne(targetEntity=TypeEvenement::class, inversedBy="evenements")
     */
    private $Type;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class, inversedBy="evenements")
     */
    private $Sport;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="Evenement")
     */
    private $inscriptions;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="Evenement")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="evenement")
     */
    private $fluxes;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->fluxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nomEvenement;
    }

    public function setNomEvenement(string $nomEvenement): self
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getLieuEvenement(): ?string
    {
        return $this->lieuEvenement;
    }

    public function setLieuEvenement(string $lieuEvenement): self
    {
        $this->lieuEvenement = $lieuEvenement;

        return $this;
    }

    public function getCoutEvenement(): ?int
    {
        return $this->coutEvenement;
    }

    public function setCoutEvenement(int $coutEvenement): self
    {
        $this->coutEvenement = $coutEvenement;

        return $this;
    }

    public function getDescripEvenement(): ?string
    {
        return $this->descripEvenement;
    }

    public function setDescripEvenement(string $descripEvenement): self
    {
        $this->descripEvenement = $descripEvenement;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): self
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function getImageEvenement(): ?string
    {
        return $this->imageEvenement;
    }

    public function setImageEvenement(?string $imageEvenement): self
    {
        $this->imageEvenement = $imageEvenement;

        return $this;
    }

    public function getVignetteEvenement(): ?string
    {
        return $this->vignetteEvenement;
    }

    public function setVignetteEvenement(?string $vignetteEvenement): self
    {
        $this->vignetteEvenement = $vignetteEvenement;

        return $this;
    }

    public function getType(): ?TypeEvenement
    {
        return $this->Type;
    }

    public function setType(?TypeEvenement $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->Sport;
    }

    public function setSport(?Sport $Sport): self
    {
        $this->Sport = $Sport;

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setEvenement($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEvenement() === $this) {
                $inscription->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setEvenement($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getEvenement() === $this) {
                $document->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Flux[]
     */
    public function getFluxes(): Collection
    {
        return $this->fluxes;
    }

    public function addFlux(Flux $flux): self
    {
        if (!$this->fluxes->contains($flux)) {
            $this->fluxes[] = $flux;
            $flux->setEvenement($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->fluxes->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getEvenement() === $this) {
                $flux->setEvenement(null);
            }
        }

        return $this;
    }
}
