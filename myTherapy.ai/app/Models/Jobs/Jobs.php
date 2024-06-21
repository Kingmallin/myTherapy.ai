<?php

namespace App\Models\Jobs;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="jobs")
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $queue;

    /**
     * @ORM\Column(type="text")
     */
    private $payload;

    /**
     * @ORM\Column(type="smallint")
     */
    private $attempts;

    /**
     * @ORM\Column(type="smallint")
     */
    private $reserved;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $reserved_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $available_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    // Getters and setters...

    public function getId(): int
    {
        return $this->id;
    }

    public function getQueue(): string
    {
        return $this->queue;
    }

    public function setQueue(string $queue): void
    {
        $this->queue = $queue;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    public function getAttempts(): int
    {
        return $this->attempts;
    }

    public function setAttempts(int $attempts): void
    {
        $this->attempts = $attempts;
    }

    public function getReserved(): int
    {
        return $this->reserved;
    }

    public function setReserved(int $reserved): void
    {
        $this->reserved = $reserved;
    }

    public function getReservedAt(): ?\DateTime
    {
        return $this->reserved_at;
    }

    public function setReservedAt(?\DateTime $reservedAt): void
    {
        $this->reserved_at = $reservedAt;
    }

    public function getAvailableAt(): ?\DateTime
    {
        return $this->available_at;
    }

    public function setAvailableAt(?\DateTime $availableAt): void
    {
        $this->available_at = $availableAt;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->created_at = $createdAt;
    }
}
