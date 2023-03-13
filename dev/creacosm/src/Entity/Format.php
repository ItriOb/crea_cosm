<?php

namespace App\Entity;

use App\Repository\FormatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormatRepository::class)]
class Format
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $format = null;

    #[ORM\OneToMany(mappedBy: 'format', targetEntity: Statistique::class)]
    private Collection $statistiques;

    public function __construct()
    {
        $this->statistiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return Collection<int, Statistique>
     */
    public function getStatistiques(): Collection
    {
        return $this->statistiques;
    }

    public function addStatistique(Statistique $statistique): self
    {
        if (!$this->statistiques->contains($statistique)) {
            $this->statistiques->add($statistique);
            $statistique->setFormat($this);
        }

        return $this;
    }

    public function removeStatistique(Statistique $statistique): self
    {
        if ($this->statistiques->removeElement($statistique)) {
            // set the owning side to null (unless already changed)
            if ($statistique->getFormat() === $this) {
                $statistique->setFormat(null);
            }
        }

        return $this;
    }
}
