<?php

namespace App\Models\Ai;

use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

/**
 * @ORM\Entity
 * @ORM\Table(name="ai_conversations")
 */
class AiConversation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\Therapist\Therapist")
     * @ORM\JoinColumn(name="therapist_id", referencedColumnName="id", nullable=false)
     */
    private $therapist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sender;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sentAt;

    /**
     * @throws \Exception
     */
    public function __construct(int $therapistId, int $userId, string $message, string $sender)
    {
        $this->therapist = $therapistId;
        $this->user = $userId;
        $this->message = $message;
        $this->sender = $sender;
        $this->sentAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }

    // Getters and setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTherapistId(): int
    {
        return $this->therapist;
    }

    public function getUserId(): int
    {
        return $this->user;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getSentAt(): DateTimeImmutable
    {
        return $this->sentAt;
    }
}

