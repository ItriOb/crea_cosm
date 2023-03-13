<?php

namespace App\Entity;

use App\Repository\SondageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SondageRepository::class)]
class Sondage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $introduction = null;

    #[ORM\Column]
    private ?bool $visibilite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecreation = null;

    #[ORM\ManyToOne(inversedBy: 'sondages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $createur = null;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'sondagesrep')]
    private Collection $reponsesutilisateurs;

    #[ORM\ManyToMany(targetEntity: Theme::class, inversedBy: 'sondages')]
    private Collection $theme;

    #[ORM\OneToMany(mappedBy: 'sondage', targetEntity: Statistique::class, orphanRemoval: true)]
    private Collection $statistique;

    public function __construct()
    {
        $this->reponsesutilisateurs = new ArrayCollection();
        $this->theme = new ArrayCollection();
        $this->statistique = new ArrayCollection();
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

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(string $introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }

    public function isVisibilite(): ?bool
    {
        return $this->visibilite;
    }

    public function setVisibilite(bool $visibilite): self
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getCreateur(): ?Utilisateur
    {
        return $this->createur;
    }

    public function setCreateur(?Utilisateur $createur): self
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getReponsesutilisateurs(): Collection
    {
        return $this->reponsesutilisateurs;
    }

    public function addReponsesutilisateur(Utilisateur $reponsesutilisateur): self
    {
        if (!$this->reponsesutilisateurs->contains($reponsesutilisateur)) {
            $this->reponsesutilisateurs->add($reponsesutilisateur);
            $reponsesutilisateur->addSondagesrep($this);
        }

        return $this;
    }

    public function removeReponsesutilisateur(Utilisateur $reponsesutilisateur): self
    {
        if ($this->reponsesutilisateurs->removeElement($reponsesutilisateur)) {
            $reponsesutilisateur->removeSondagesrep($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->theme->contains($theme)) {
            $this->theme->add($theme);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        $this->theme->removeElement($theme);

        return $this;
    }

    /**
     * @return Collection<int, Statistique>
     */
    public function getStatistique(): Collection
    {
        return $this->statistique;
    }

    public function addStatistique(Statistique $statistique): self
    {
        if (!$this->statistique->contains($statistique)) {
            $this->statistique->add($statistique);
            $statistique->setSondage($this);
        }

        return $this;
    }

    public function removeStatistique(Statistique $statistique): self
    {
        if ($this->statistique->removeElement($statistique)) {
            // set the owning side to null (unless already changed)
            if ($statistique->getSondage() === $this) {
                $statistique->setSondage(null);
            }
        }

        return $this;
    }
}
