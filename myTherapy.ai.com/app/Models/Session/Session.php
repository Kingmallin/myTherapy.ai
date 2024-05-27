<?php

namespace App\Models\Session;

use App\Models\User\User;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="sessions")
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * @var Collection | User
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $ip_address;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $user_agent;

    /**
     * @ORM\Column(type="text")
     */
    private $payload;

    /**
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private $last_activity;

    // Getters and setters for properties

    /**
     * Get the associated user.
     *
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Set the associated user.
     *
     * @param User|null $user
     * @return self
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
