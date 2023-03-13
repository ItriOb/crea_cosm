<?php

namespace App\Entity;

use App\Repository\VisuelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisuelRepository::class)]
class Visuel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $visuel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisuel(): ?string
    {
        return $this->visuel;
    }

    public function setVisuel(string $visuel): self
    {
        $this->visuel = $visuel;

        return $this;
    }
}
