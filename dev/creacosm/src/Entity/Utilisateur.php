<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
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
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $motdepasse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedenaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profession = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entreprise = null;

    #[ORM\OneToMany(mappedBy: 'createur', targetEntity: Sondage::class, orphanRemoval: true)]
    private Collection $sondages;

    #[ORM\ManyToMany(targetEntity: Sondage::class, inversedBy: 'reponsesutilisateurs')]
    private Collection $sondagesrep;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Repondre::class, orphanRemoval: true)]
    private Collection $reponses;

    public function __construct()
    {
        $this->sondages = new ArrayCollection();
        $this->sondagesrep = new ArrayCollection();
        $this->reponses = new ArrayCollection();
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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(?string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * @return Collection<int, Sondage>
     */
    public function getSondages(): Collection
    {
        return $this->sondages;
    }

    public function addSondage(Sondage $sondage): self
    {
        if (!$this->sondages->contains($sondage)) {
            $this->sondages->add($sondage);
            $sondage->setCreateur($this);
        }

        return $this;
    }

    public function removeSondage(Sondage $sondage): self
    {
        if ($this->sondages->removeElement($sondage)) {
            // set the owning side to null (unless already changed)
            if ($sondage->getCreateur() === $this) {
                $sondage->setCreateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sondage>
     */
    public function getSondagesrep(): Collection
    {
        return $this->sondagesrep;
    }

    public function addSondagesrep(Sondage $sondagesrep): self
    {
        if (!$this->sondagesrep->contains($sondagesrep)) {
            $this->sondagesrep->add($sondagesrep);
        }

        return $this;
    }

    public function removeSondagesrep(Sondage $sondagesrep): self
    {
        $this->sondagesrep->removeElement($sondagesrep);

        return $this;
    }

    /**
     * @return Collection<int, Repondre>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Repondre $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setUtilisateur($this);
        }

        return $this;
    }

    public function removeReponse(Repondre $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getUtilisateur() === $this) {
                $reponse->setUtilisateur(null);
            }
        }

        return $this;
    }
}
