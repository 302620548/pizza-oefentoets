<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $naam = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'category_id', targetEntity: Pizza::class)]
    private Collection $getPizzas;

    public function __construct()
    {
        $this->getPizzas = new ArrayCollection();
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

    /**
     * @return Collection<int, Pizza>
     */
    public function getGetPizzas(): Collection
    {
        return $this->getPizzas;
    }

    public function addGetPizza(Pizza $getPizza): self
    {
        if (!$this->getPizzas->contains($getPizza)) {
            $this->getPizzas->add($getPizza);
            $getPizza->setCategoryId($this);
        }

        return $this;
    }

    public function removeGetPizza(Pizza $getPizza): self
    {
        if ($this->getPizzas->removeElement($getPizza)) {
            // set the owning side to null (unless already changed)
            if ($getPizza->getCategoryId() === $this) {
                $getPizza->setCategoryId(null);
            }
        }

        return $this;
    }
}
