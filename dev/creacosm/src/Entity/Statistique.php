<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatistiqueRepository::class)]
class Statistique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\ManyToOne(inversedBy: 'statistique')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sondage $sondage = null;

    #[ORM\ManyToMany(targetEntity: Critere::class)]
    private Collection $criteres;

    #[ORM\ManyToOne(inversedBy: 'statistiques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Format $format = null;

    public function __construct()
    {
        $this->criteres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSondage(): ?Sondage
    {
        return $this->sondage;
    }

    public function setSondage(?Sondage $sondage): self
    {
        $this->sondage = $sondage;

        return $this;
    }

    /**
     * @return Collection<int, Critere>
     */
    public function getCriteres(): Collection
    {
        return $this->criteres;
    }

    public function addCritere(Critere $critere): self
    {
        if (!$this->criteres->contains($critere)) {
            $this->criteres->add($critere);
        }

        return $this;
    }

    public function removeCritere(Critere $critere): self
    {
        $this->criteres->removeElement($critere);

        return $this;
    }

    public function getFormat(): ?Format
    {
        return $this->format;
    }

    public function setFormat(?Format $format): self
    {
        $this->format = $format;

        return $this;
    }
}
