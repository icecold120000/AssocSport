<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
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
    private $nomEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $genreEleve;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateMaj;

    /**
     * @ORM\Column(type="smallint")
     */
    private $archiveEleve;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="eleves")
     */
    private $Classe;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="Eleve")
     */
    private $inscriptions;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieEleve::class, inversedBy="eleves")
     */
    private $Categorie;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     */
    private $Utilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $numTelEleve;

    /**
     * @ORM\Column(type="integer")
     */
    private $numTelParent;

    /**
     * @ORM\OneToMany(targetEntity=Flux::class, mappedBy="eleve")
     */
    private $fluxes;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->fluxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEleve(): ?string
    {
        return $this->nomEleve;
    }

    public function setNomEleve(string $nomEleve): self
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    public function getPrenomEleve(): ?string
    {
        return $this->prenomEleve;
    }

    public function setPrenomEleve(string $prenomEleve): self
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getGenreEleve(): ?string
    {
        return $this->genreEleve;
    }

    public function setGenreEleve(string $genreEleve): self
    {
        $this->genreEleve = $genreEleve;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->dateMaj;
    }

    public function setDateMaj(?\DateTimeInterface $dateMaj): self
    {
        $this->dateMaj = $dateMaj;

        return $this;
    }

    public function getArchiveEleve(): ?int
    {
        return $this->archiveEleve;
    }

    public function setArchiveEleve(int $archiveEleve): self
    {
        $this->archiveEleve = $archiveEleve;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->Classe;
    }

    public function setClasse(?Classe $Classe): self
    {
        $this->Classe = $Classe;

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
            $inscription->setEleve($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEleve() === $this) {
                $inscription->setEleve(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?CategorieEleve
    {
        return $this->Categorie;
    }

    public function setCategorie(?CategorieEleve $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    public function getNumTelEleve(): ?int
    {
        return $this->numTelEleve;
    }

    public function setNumTelEleve(int $numTelEleve): self
    {
        $this->numTelEleve = $numTelEleve;

        return $this;
    }

    public function getNumTelParent(): ?int
    {
        return $this->numTelParent;
    }

    public function setNumTelParent(int $numTelParent): self
    {
        $this->numTelParent = $numTelParent;

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
            $flux->setEleve($this);
        }

        return $this;
    }

    public function removeFlux(Flux $flux): self
    {
        if ($this->fluxes->removeElement($flux)) {
            // set the owning side to null (unless already changed)
            if ($flux->getEleve() === $this) {
                $flux->setEleve(null);
            }
        }

        return $this;
    }
}
