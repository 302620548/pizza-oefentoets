<?php

namespace App\Entity;

use App\Repository\BestelregelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BestelregelRepository::class)]
class Bestelregel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $aantal = null;

    #[ORM\ManyToOne(inversedBy: 'getBestelregels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bestelling $bestelling_id = null;

    #[ORM\ManyToOne(inversedBy: 'getBestelregels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pizza $pizza_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getBestellingId(): ?Bestelling
    {
        return $this->bestelling_id;
    }

    public function setBestellingId(?Bestelling $bestelling_id): self
    {
        $this->bestelling_id = $bestelling_id;

        return $this;
    }

    public function getPizzaId(): ?Pizza
    {
        return $this->pizza_id;
    }

    public function setPizzaId(?Pizza $pizza_id): self
    {
        $this->pizza_id = $pizza_id;

        return $this;
    }
}
