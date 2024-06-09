<?php

namespace App\Models\Websocket;

use App\Models\Admin\Admin;
use App\Models\User\User as AppUser;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="websocket_connection")
 */
class WebSocketConnection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\Admin\Admin")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id", nullable=true)
     */
    private $admin;

    /**
     * @ORM\Column(type="string")
     */
    private $clientId;

    /**
     * @ORM\Column(type="string")
     */
    private $channel;

    /**
     * @ORM\Column(type="string")
     */
    private $timeZone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTimeImmutable
     */
    private $createdDateTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTimeImmutable|null
     */
    private $updatedDateTime;

    /**
     * @throws \Exception
     */
    public function __construct(
        ?AppUser $user,
        ?Admin $admin,
        string $clientId,
        string $channel,
        string $timeZone
    ) {
        $this->user = $user;
        $this->admin = $admin;
        $this->clientId = $clientId;
        $this->channel = $channel;
        $this->timeZone = $timeZone;
        $this->active = true;
        $this->createdDateTime = new DateTimeImmutable('now', new DateTimeZone('UTC'));
        $this->updatedDateTime = null;
    }

    /**
     * Deactivate the connection.
     */
    public function deactivate()
    {
        $this->active = false;
        $this->updatedDateTime = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }

    // Getters and setters...

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): ?AppUser
    {
        return $this->user;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getTimeZone(): string
    {
        return $this->timeZone;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getCreatedDateTime(): DateTimeImmutable
    {
        return $this->createdDateTime;
    }

    public function getUpdatedDateTime(): ?DateTimeImmutable
    {
        return $this->updatedDateTime;
    }

    public function setUser(?AppUser $user): void
    {
        $this->user = $user;
    }

    public function setAdmin(?Admin $admin): void
    {
        $this->admin = $admin;
    }

    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function setChannel(string $channel): void
    {
        $this->channel = $channel;
    }

    public function setTimeZone(string $timeZone): void
    {
        $this->timeZone = $timeZone;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function setCreatedDateTime(DateTimeImmutable $createdDateTime): void
    {
        $this->createdDateTime = $createdDateTime;
    }

    public function setUpdatedDateTime(?DateTimeImmutable $updatedDateTime): void
    {
        $this->updatedDateTime = $updatedDateTime;
    }
}
