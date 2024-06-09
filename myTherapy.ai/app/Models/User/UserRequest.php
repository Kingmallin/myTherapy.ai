<?php

namespace App\Models\User;

use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeZone;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_requests")
 */
class UserRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userRequests")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @throws \Exception
     */
    public function __construct(User $user, string $type, string $description)
    {
        $this->user = $user;
        $this->type = $type;
        $this->description = $description;
        $this->createdAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
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

    public function getType(): string
    {
        return $this->type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
