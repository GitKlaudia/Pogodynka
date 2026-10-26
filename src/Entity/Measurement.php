<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Temperature = null;

    #[ORM\Column]
    private ?int $Humidity = null;

    #[ORM\Column(length: 255)]
    private ?string $Wind = null;

    #[ORM\Column]
    private ?int $Precipitation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Date = null;

    #[ORM\ManyToOne(inversedBy: 'measurements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Place $Place = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperature(): ?int
    {
        return $this->Temperature;
    }

    public function setTemperature(int $Temperature): static
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->Humidity;
    }

    public function setHumidity(int $Humidity): static
    {
        $this->Humidity = $Humidity;

        return $this;
    }

    public function getWind(): ?string
    {
        return $this->Wind;
    }

    public function setWind(string $Wind): static
    {
        $this->Wind = $Wind;

        return $this;
    }

    public function getPrecipitation(): ?int
    {
        return $this->Precipitation;
    }

    public function setPrecipitation(int $Precipitation): static
    {
        $this->Precipitation = $Precipitation;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    public function setDate(\DateTime $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->Place;
    }

    public function setPlace(?Place $Place): static
    {
        $this->Place = $Place;

        return $this;
    }
}
