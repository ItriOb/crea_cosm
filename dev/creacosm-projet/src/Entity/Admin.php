<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $entreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\OneToMany(mappedBy: 'createur', targetEntity: Sondage::class, orphanRemoval: true)]
    private Collection $sondages_crees;

    public function __construct()
    {
        $this->sondages_crees = new ArrayCollection();
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

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection<int, Sondage>
     */
    public function getSondagesCrees(): Collection
    {
        return $this->sondages_crees;
    }

    public function addSondagesCree(Sondage $sondagesCree): self
    {
        if (!$this->sondages_crees->contains($sondagesCree)) {
            $this->sondages_crees->add($sondagesCree);
            $sondagesCree->setCreateur($this);
        }

        return $this;
    }

    public function removeSondagesCree(Sondage $sondagesCree): self
    {
        if ($this->sondages_crees->removeElement($sondagesCree)) {
            // set the owning side to null (unless already changed)
            if ($sondagesCree->getCreateur() === $this) {
                $sondagesCree->setCreateur(null);
            }
        }

        return $this;
    }
}
