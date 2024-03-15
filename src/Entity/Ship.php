<?php

namespace App\Entity;

use App\Repository\ShipRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ShipRepository::class)]
class Ship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getShips"])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(["getShips"])]
    private ?int $eveId = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getShips"])]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["getShips"])]
    private ?string $photoUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["getShips"])]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["getShips"])]
    private ?int $groupId = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["getShips"])]
    private ?int $capacity = null;

    #[ORM\ManyToOne(inversedBy: 'ships')]
    private ?Character $owner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEveId(): ?int
    {
        return $this->eveId;
    }

    public function setEveId(int $eveId): static
    {
        $this->eveId = $eveId;

        return $this;
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

    public function getPhotoUrl(): ?string
    {
        return $this->photoUrl;
    }

    public function setPhotoUrl(?string $photoUrl): static
    {
        $this->photoUrl = $photoUrl;

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

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function setGroupId(?int $groupId): static
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getOwner(): ?Character
    {
        return $this->owner;
    }

    public function setOwner(?Character $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
