<?php

namespace App\Models\Subscription;

use App\Models\User\User;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

/**
 * @ORM\Entity
 * @ORM\Table(name="subscriptions")
 */
class Subscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private $user;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $cost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $level;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dueDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $expiryDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function __construct(User $user, string $level, float $cost, DateTimeImmutable $dueDate, ?DateTimeImmutable $expiryDate = null, bool $isActive = true)
    {
        $this->user = $user;
        $this->level = $level;
        $this->cost = $cost;
        $this->dueDate = $dueDate;
        $this->expiryDate = $expiryDate;
        $this->isActive = $isActive;
    }

    // Getters and setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    public function getDueDate(): DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(DateTimeImmutable $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getExpiryDate(): ?DateTimeImmutable
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?DateTimeImmutable $expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}
