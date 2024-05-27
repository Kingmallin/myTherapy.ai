<?php

namespace App\Models\Braintree;

use App\Models\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="braintree_information")
 */
class BraintreeInformation
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
     * @ORM\Column(type="string", length=255)
     */
    private $braintreeCustomerId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subscriptionId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paymentMethodToken;

    public function __construct(User $user, string $braintreeCustomerId, ?string $subscriptionId = null, ?string $paymentMethodToken = null)
    {
        $this->user = $user;
        $this->braintreeCustomerId = $braintreeCustomerId;
        $this->subscriptionId = $subscriptionId;
        $this->paymentMethodToken = $paymentMethodToken;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setBraintreeCustomerId(string $braintreeCustomerId): void
    {
        $this->braintreeCustomerId = $braintreeCustomerId;
    }

    public function getBraintreeCustomerId(): ?string
    {
        return $this->braintreeCustomerId;
    }

    public function setSubscriptionId(?string $subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    public function setPaymentMethodToken(?string $paymentMethodToken): void
    {
        $this->paymentMethodToken = $paymentMethodToken;
    }

    public function getPaymentMethodToken(): ?string
    {
        return $this->paymentMethodToken;
    }
}
