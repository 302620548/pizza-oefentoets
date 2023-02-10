<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $naam = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'getPizzas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category_id = null;

    #[ORM\OneToMany(mappedBy: 'pizza_id', targetEntity: Bestelregel::class)]
    private Collection $getBestelregels;

    public function __construct()
    {
        $this->getBestelregels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->category_id;
    }

    public function setCategoryId(?Category $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * @return Collection<int, Bestelregel>
     */
    public function getGetBestelregels(): Collection
    {
        return $this->getBestelregels;
    }

    public function addGetBestelregel(Bestelregel $getBestelregel): self
    {
        if (!$this->getBestelregels->contains($getBestelregel)) {
            $this->getBestelregels->add($getBestelregel);
            $getBestelregel->setPizzaId($this);
        }

        return $this;
    }

    public function removeGetBestelregel(Bestelregel $getBestelregel): self
    {
        if ($this->getBestelregels->removeElement($getBestelregel)) {
            // set the owning side to null (unless already changed)
            if ($getBestelregel->getPizzaId() === $this) {
                $getBestelregel->setPizzaId(null);
            }
        }

        return $this;
    }
}
