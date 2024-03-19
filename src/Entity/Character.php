<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getShips"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getShips"])]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["getShips"])]
    private ?int $eveid = null;

    #[ORM\OneToMany(targetEntity: Ship::class, mappedBy: 'owner')]
    private Collection $ships;

    #[ORM\Column(nullable: true)]
    #[Groups(["getShips"])]
    private ?int $shipNumber = null;

    #[ORM\Column(nullable: true)]
    private ?int $allianceId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $birthday = null;

    #[ORM\Column(nullable: true)]
    private ?int $corporationId = null;

    #[ORM\Column(nullable: true)]
    private ?int $bloddlineId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(nullable: true)]
    private ?int $raceId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $securityStatus = null;

    public function __construct()
    {
        $this->ships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEveid(): ?int
    {
        return $this->eveid;
    }

    public function setEveid(?int $eveid): static
    {
        $this->eveid = $eveid;

        return $this;
    }

    /**
     * @return Collection<int, Ship>
     */
    public function getShips(): Collection
    {
        return $this->ships;
    }

    public function addShip(Ship $ship): static
    {
        if (!$this->ships->contains($ship)) {
            $this->ships->add($ship);
            $ship->setOwner($this);
        }

        return $this;
    }

    public function removeShip(Ship $ship): static
    {
        if ($this->ships->removeElement($ship)) {
            // set the owning side to null (unless already changed)
            if ($ship->getOwner() === $this) {
                $ship->setOwner(null);
            }
        }

        return $this;
    }

    public function getShipNumber(): ?int
    {
        return $this->shipNumber;
    }

    public function setShipNumber(?int $shipNumber): static
    {
        $this->shipNumber = $shipNumber;

        return $this;
    }

    public function getAllianceId(): ?int
    {
        return $this->allianceId;
    }

    public function setAllianceId(?int $allianceId): static
    {
        $this->allianceId = $allianceId;

        return $this;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(?string $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCorporationId(): ?int
    {
        return $this->corporationId;
    }

    public function setCorporationId(?int $corporationId): static
    {
        $this->corporationId = $corporationId;

        return $this;
    }

    public function getBloddlineId(): ?int
    {
        return $this->bloddlineId;
    }

    public function setBloddlineId(?int $bloddlineId): static
    {
        $this->bloddlineId = $bloddlineId;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getRaceId(): ?int
    {
        return $this->raceId;
    }

    public function setRaceId(?int $raceId): static
    {
        $this->raceId = $raceId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSecurityStatus(): ?float
    {
        return $this->securityStatus;
    }

    public function setSecurityStatus(?float $securityStatus): static
    {
        $this->securityStatus = $securityStatus;

        return $this;
    }
}
