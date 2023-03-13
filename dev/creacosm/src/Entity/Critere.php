<?php

namespace App\Entity;

use App\Repository\CritereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CritereRepository::class)]
class Critere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $critere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCritere(): ?string
    {
        return $this->critere;
    }

    public function setCritere(string $critere): self
    {
        $this->critere = $critere;

        return $this;
    }
}
