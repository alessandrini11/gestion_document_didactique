<?php

namespace App\Entity;

use App\Repository\DeplacementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeplacementRepository::class)
 */
class Deplacement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="deplacements")
     */
    private $document;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="deplacements")
     */
    private $personne;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     */
    private $date_retour;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmation_sortie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmation_retour;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }

    public function setDateRetour(\DateTimeInterface $date_retour): self
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    public function getBoolean(): ?string
    {
        return $this->boolean;
    }

    public function setBoolean(string $boolean): self
    {
        $this->boolean = $boolean;

        return $this;
    }

    public function getConfirmationSortie(): ?bool
    {
        return $this->confirmation_sortie;
    }

    public function setConfirmationSortie(bool $confirmation_sortie): self
    {
        $this->confirmation_sortie = $confirmation_sortie;

        return $this;
    }

    public function getConfirmationRetour(): ?bool
    {
        return $this->confirmation_retour;
    }

    public function setConfirmationRetour(bool $confirmation_retour): self
    {
        $this->confirmation_retour = $confirmation_retour;

        return $this;
    }
}
