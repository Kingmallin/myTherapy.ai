<?php

namespace App\Models\Goals;

use App\Models\Therapist\Therapist;
use App\Models\User\User;
use DateTimeImmutable;
use DateTimeZone;

class Goal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\User\User", inversedBy="goals")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Models\Therapist\Therapist")
     * @ORM\JoinColumn(name="therapist_id", referencedColumnName="id", nullable=false)
     */
    private $therapist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $goal;

    /**
     * @ORM\Column(type="text")
     */
    private $steps;

    /**
     * @ORM\Column(type="datetime")
     */
    private $targetDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @throws \Exception
     */
    public function __construct(User $user, Therapist $therapist, string $goal, string $steps, \DateTimeImmutable $targetDate)
    {
        $this->user = $user;
        $this->therapist = $therapist;
        $this->goal = $goal;
        $this->steps = $steps;
        $this->targetDate = $targetDate;
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

    public function getTherapist(): Therapist
    {
        return $this->therapist;
    }

    public function getGoal(): string
    {
        return $this->goal;
    }

    public function getSteps(): string
    {
        return $this->steps;
    }

    public function getTargetDate(): DateTimeImmutable
    {
        return $this->targetDate;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setGoal(string $goal): void
    {
        $this->goal = $goal;
    }

    public function setSteps(string $steps): void
    {
        $this->steps = $steps;
    }

    public function setTargetDate(DateTimeImmutable $targetDate): void
    {
        $this->targetDate = $targetDate;
    }
}
