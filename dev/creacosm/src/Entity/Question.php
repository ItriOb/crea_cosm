<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: Reponse::class, orphanRemoval: true)]
    private Collection $reponses;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\ManyToOne]
    private ?Visuel $visuel = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: Repondre::class, orphanRemoval: true)]
    private Collection $reponseustilisateur;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->reponseustilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection<int, Reponse>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setQuestion($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestion() === $this) {
                $reponse->setQuestion(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVisuel(): ?Visuel
    {
        return $this->visuel;
    }

    public function setVisuel(?Visuel $visuel): self
    {
        $this->visuel = $visuel;

        return $this;
    }

    /**
     * @return Collection<int, Repondre>
     */
    public function getReponseustilisateur(): Collection
    {
        return $this->reponseustilisateur;
    }

    public function addReponseustilisateur(Repondre $reponseustilisateur): self
    {
        if (!$this->reponseustilisateur->contains($reponseustilisateur)) {
            $this->reponseustilisateur->add($reponseustilisateur);
            $reponseustilisateur->setQuestion($this);
        }

        return $this;
    }

    public function removeReponseustilisateur(Repondre $reponseustilisateur): self
    {
        if ($this->reponseustilisateur->removeElement($reponseustilisateur)) {
            // set the owning side to null (unless already changed)
            if ($reponseustilisateur->getQuestion() === $this) {
                $reponseustilisateur->setQuestion(null);
            }
        }

        return $this;
    }
}
