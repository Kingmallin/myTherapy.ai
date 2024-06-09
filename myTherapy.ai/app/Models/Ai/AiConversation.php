<?php

namespace App\Models\Ai;

use App\Models\Therapist\Therapist;
use App\Models\Admin\Admin;
use App\Models\User\User;
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
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\Admin\Admin")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id", nullable=true)
     */
    private $admin;

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
    public function __construct(Therapist $therapist, ?User $user, ?Admin $admin, string $message, string $sender)
    {
        $this->therapist = $therapist;
        $this->user = $user;
        $this->admin = $admin;
        $this->message = $message;
        $this->sender = $sender;
        $this->sentAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }

    // Getters and setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTherapist(): Therapist
    {
        return $this->therapist;
    }

    public function getUser(): User|null
    {
        return $this->user;
    }

    public function getAdmin(): Admin|null
    {
        return $this->admin;
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
