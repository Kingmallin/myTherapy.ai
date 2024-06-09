<?php

namespace App\Models\User;

use App\Enums\SubscriptionLevel;
use App\Enums\UserStatus;
use DateTimeImmutable;
use DateTimeZone;
use Illuminate\Support\Facades\Hash;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Contracts\Service\Attribute\SubscribedService;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $surName;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $penName;

    /**
     * @ORM\Column(type="string")
     */
    private $dob;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     */
    private $uUid;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verified;

    /**
     * @ORM\Column(type="string")
     */
    private $ip;

    /**
     * @ORM\Column(type="string")
     */
    private $timeZone;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="string")
     */
    private $subscriptionLevel;

    /**
     * @ORM\Column(type="integer")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTimeImmutable
     */
    private $createdDateTime;

    /**
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $surName,
        string $username,
        string $penName,
        string $dob,
        string $email,
        string $password,
        bool $verified,
        string $ip,
        string $timeZone,
        UserStatus $status,
        SubscriptionLevel $subscriptionLevel
    ) {
        $this->name = $name;
        $this->surName = $surName;
        $this->username = $username;
        $this->penName = $penName;
        $this->dob = $dob;
        $this->email = $email;
        $this->password = Hash::make($password);
        $this->uUid = Uuid::uuid4()->toString();
        $this->verified = $verified;
        $this->ip = $ip;
        $this->timeZone = $timeZone;
        $this->status = $status->value;
        $this->subscriptionLevel = $subscriptionLevel->value;
        $this->active = 1;
        $this->createdDateTime = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurName(): string
    {
        return $this->surName;
    }

    public function setSurName(string $surName): void
    {
        $this->surName = $surName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPenName(): string
    {
        return $this->penName;
    }

    public function setPenName(string $penName): void
    {
        $this->penName = $penName;
    }

    public function getDob(): string
    {
        return $this->dob;
    }

    public function setDob(string $dob): void
    {
        $this->dob = $dob;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = Hash::make($password); // Hash the password
    }

    public function isVerified(): bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): void
    {
        $this->verified = $verified;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    public function getTimeZone(): string
    {
        return $this->timeZone;
    }

    public function setTimeZone(string $timeZone): void
    {
        $this->timeZone = $timeZone;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getUuid()
    {
        return $this->uUid;
    }

    public function setUuid()
    {
        $this->uUid = Uuid::uuid4()->toString();
    }

    public function setSubscriptionLevel(SubscriptionLevel $subscriptionLevel)
    {
        $this->subscriptionLevel = $subscriptionLevel;
    }

    public function getSubscriptionLevel(): SubscriptionLevel
    {
        return SubscriptionLevel::from($this->subscriptionLevel);
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function getCreatedDateTime(): DateTimeImmutable
    {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime(DateTimeImmutable $createdDateTime): void
    {
        $this->createdDateTime = $createdDateTime;
    }
}
