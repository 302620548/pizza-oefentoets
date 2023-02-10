<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KlantRepository::class)]
class Klant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $naam = null;

    #[ORM\Column(length: 255)]
    private ?string $adres = null;

    #[ORM\Column(length: 255)]
    private ?string $postcode = null;

    #[ORM\Column(length: 255)]
    private ?string $woonplaats = null;

    #[ORM\OneToMany(mappedBy: 'klant_id', targetEntity: Bestelling::class)]
    private Collection $getBestellingen;

    public function __construct()
    {
        $this->getBestellingen = new ArrayCollection();
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

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    /**
     * @return Collection<int, Bestelling>
     */
    public function getGetBestellingen(): Collection
    {
        return $this->getBestellingen;
    }

    public function addGetBestellingen(Bestelling $getBestellingen): self
    {
        if (!$this->getBestellingen->contains($getBestellingen)) {
            $this->getBestellingen->add($getBestellingen);
            $getBestellingen->setKlantId($this);
        }

        return $this;
    }

    public function removeGetBestellingen(Bestelling $getBestellingen): self
    {
        if ($this->getBestellingen->removeElement($getBestellingen)) {
            // set the owning side to null (unless already changed)
            if ($getBestellingen->getKlantId() === $this) {
                $getBestellingen->setKlantId(null);
            }
        }

        return $this;
    }
}
