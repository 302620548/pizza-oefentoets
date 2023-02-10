<?php

namespace App\Entity;

use App\Repository\BestellingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BestellingRepository::class)]
class Bestelling
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datum = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'getBestellingen')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Klant $klant_id = null;

    #[ORM\OneToMany(mappedBy: 'bestelling_id', targetEntity: Bestelregel::class)]
    private Collection $getBestelregels;

    public function __construct()
    {
        $this->getBestelregels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getKlantId(): ?Klant
    {
        return $this->klant_id;
    }

    public function setKlantId(?Klant $klant_id): self
    {
        $this->klant_id = $klant_id;

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
            $getBestelregel->setBestellingId($this);
        }

        return $this;
    }

    public function removeGetBestelregel(Bestelregel $getBestelregel): self
    {
        if ($this->getBestelregels->removeElement($getBestelregel)) {
            // set the owning side to null (unless already changed)
            if ($getBestelregel->getBestellingId() === $this) {
                $getBestelregel->setBestellingId(null);
            }
        }

        return $this;
    }
}
