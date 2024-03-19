<?php

namespace App\Entity;

use App\Repository\CharacterEveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterEveRepository::class)]
class CharacterEve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $alliance_id = null;

    #[ORM\Column(length: 255)]
    private ?string $birthday = null;

    #[ORM\Column(nullable: true)]
    private ?int $corporation_id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $bloodline_id = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $race_id = null;

    #[ORM\Column(nullable: true)]
    private ?float $security_status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllianceId(): ?int
    {
        return $this->alliance_id;
    }

    public function setAllianceId(?int $alliance_id): static
    {
        $this->alliance_id = $alliance_id;

        return $this;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCorporationId(): ?int
    {
        return $this->corporation_id;
    }

    public function setCorporationId(?int $corporation_id): static
    {
        $this->corporation_id = $corporation_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBloodlineId(): ?int
    {
        return $this->bloodline_id;
    }

    public function setBloodlineId(?int $bloodline_id): static
    {
        $this->bloodline_id = $bloodline_id;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

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

    public function getRaceId(): ?int
    {
        return $this->race_id;
    }

    public function setRaceId(?int $race_id): static
    {
        $this->race_id = $race_id;

        return $this;
    }

    public function getSecurityStatus(): ?float
    {
        return $this->security_status;
    }

    public function setSecurityStatus(?float $security_status): static
    {
        $this->security_status = $security_status;

        return $this;
    }
}
