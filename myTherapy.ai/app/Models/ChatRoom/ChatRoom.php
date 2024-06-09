<?php

namespace App\Models\ChatRoom;

use App\Models\MentalHealth\MentalHealth;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="chat_rooms")
 */
class ChatRoom
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
    private $mentalHealth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $backgroundColor;

    /**
     * @ORM\Column(type="integer")
     */
    private $userLimit;

    public function __construct(
        MentalHealth $mentalHealth,
        string $name,
        ?string $description,
        string $backgroundColor,
        int $userLimit
    ) {
        $this->$mentalHealth = $mentalHealth;
        $this->name = $name;
        $this->description = $description;
        $this->backgroundColor = $backgroundColor;
        $this->userLimit = $userLimit;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function getUserLimit(): ?int
    {
        return $this->userLimit;
    }

    public function setUserLimit(int $userLimit): void
    {
        $this->userLimit = $userLimit;
    }
}
