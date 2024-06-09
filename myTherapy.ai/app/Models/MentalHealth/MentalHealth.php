<?php

namespace App\Models\MentalHealth;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mental_health_issues")
 */
class MentalHealth
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $symptoms;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $prevalence;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $treatmentOptions;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resources;

    public function __construct(
        string $type,
        ?string $description = null,
        ?string $symptoms = null,
        ?string $prevalence = null,
        ?string $treatmentOptions = null,
        ?string $resources = null
    )
    {
        $this->type = $type;
        $this->description = $description;
        $this->symptoms = $symptoms;
        $this->prevalence = $prevalence;
        $this->treatmentOptions = $treatmentOptions;
        $this->resources = $resources;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getSymptoms(): ?string
    {
        return $this->symptoms;
    }

    public function setSymptoms(?string $symptoms): void
    {
        $this->symptoms = $symptoms;
    }

    public function getPrevalence(): ?string
    {
        return $this->prevalence;
    }

    public function setPrevalence(?string $prevalence): void
    {
        $this->prevalence = $prevalence;
    }

    public function getTreatmentOptions(): ?string
    {
        return $this->treatmentOptions;
    }

    public function setTreatmentOptions(?string $treatmentOptions): void
    {
        $this->treatmentOptions = $treatmentOptions;
    }

    public function getResources(): ?string
    {
        return $this->resources;
    }

    public function setResources(?string $resources): void
    {
        $this->resources = $resources;
    }
}
