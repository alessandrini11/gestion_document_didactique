<?php

namespace App\Entity;

use App\Repository\DeplacementRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DeplacementRepository::class)
 * @ApiResource(
 *
 * )
 *
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
     * @Groups({"read:item"})
     */
    private $date_retour;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:item"})
     *
     */
    private $confirmation_sortie;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:item"})
     */
    private $confirmation_retour;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"read:item"})
     */
    private $demande_retour;


    public function __construct()
    {
        $this->date_sortie = new \DateTime();
        $this->date_retour = null;
    }

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

    public function getDemandeRetour(): ?bool
    {
        return $this->demande_retour;
    }

    public function setDemandeRetour(?bool $demande_retour): self
    {
        $this->demande_retour = $demande_retour;

        return $this;
    }
}
