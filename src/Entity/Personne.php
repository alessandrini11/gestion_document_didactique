<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 * @ApiResource()
 */
class Personne
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="personnes")
     */
    private $poste;

    /**
     * @ORM\ManyToOne(targetEntity=Filiere::class, inversedBy="personnes")
     */
    private $filiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Deplacement::class, mappedBy="personne")
     */
    private $deplacements;

    /**
     * @ORM\ManyToOne(targetEntity=Sexe::class, inversedBy="personnes")
     */
    private $sexe;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, inversedBy="personnes")
     */
    private $role;
    
    public function __construct()
    {
        $this->deplacements = new ArrayCollection();
        $this->role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPoste(): ?Post
    {
        return $this->poste;
    }

    public function setPoste(?Post $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Deplacement[]
     */
    public function getDeplacements(): Collection
    {
        return $this->deplacements;
    }

    public function addDeplacement(Deplacement $deplacement): self
    {
        if (!$this->deplacements->contains($deplacement)) {
            $this->deplacements[] = $deplacement;
            $deplacement->setPersonne($this);
        }

        return $this;
    }

    public function removeDeplacement(Deplacement $deplacement): self
    {
        if ($this->deplacements->removeElement($deplacement)) {
            // set the owning side to null (unless already changed)
            if ($deplacement->getPersonne() === $this) {
                $deplacement->setPersonne(null);
            }
        }

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(Role $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role[] = $role;
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        $this->role->removeElement($role);

        return $this;
    }
}
