<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
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
    private $nomDocument;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienDocument;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionDocument;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\ManyToOne(targetEntity=Evenement::class, inversedBy="documents")
     */
    private $Evenement;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieDocument::class, inversedBy="Document")
     */
    private $categorieDocument;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDocument(): ?string
    {
        return $this->nomDocument;
    }

    public function setNomDocument(string $nomDocument): self
    {
        $this->nomDocument = $nomDocument;

        return $this;
    }

    public function getLienDocument(): ?string
    {
        return $this->lienDocument;
    }

    public function setLienDocument(string $lienDocument): self
    {
        $this->lienDocument = $lienDocument;

        return $this;
    }

    public function getDescriptionDocument(): ?string
    {
        return $this->descriptionDocument;
    }

    public function setDescriptionDocument(string $descriptionDocument): self
    {
        $this->descriptionDocument = $descriptionDocument;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): self
    {
        $this->Evenement = $Evenement;

        return $this;
    }

    public function getCategorieDocument(): ?CategorieDocument
    {
        return $this->categorieDocument;
    }

    public function setCategorieDocument(?CategorieDocument $categorieDocument): self
    {
        $this->categorieDocument = $categorieDocument;

        return $this;
    }
}
