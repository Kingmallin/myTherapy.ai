<?php

namespace App\Models\Meme;

use App\Models\MentalHealth\MentalHealth;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="meme_images")
 */
class MemeImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\MentalHealth\MentalHealth")
     * @ORM\JoinColumn(name="mental_health_id", referencedColumnName="id", nullable=false)
     */
    private MentalHealth $mentalHealth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $altText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileLocation;

    public function __construct(MentalHealth $mentalHealth, string $name, string $altText, string $fileLocation)
    {
        $this->mentalHealth = $mentalHealth;
        $this->name = $name;
        $this->altText = $altText;
        $this->fileLocation = $fileLocation;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMentalHealth(): ?MentalHealth
    {
        return $this->mentalHealth;
    }

    public function setMentalHealth(MentalHealth $mentalHealth): void
    {
        $this->mentalHealth = $mentalHealth;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAltText(): ?string
    {
        return $this->altText;
    }

    public function setAltText(string $altText): void
    {
        $this->altText = $altText;
    }

    public function getFileLocation(): ?string
    {
        return $this->fileLocation;
    }

    public function setFileLocation(string $fileLocation): void
    {
        $this->fileLocation = $fileLocation;
    }
}
