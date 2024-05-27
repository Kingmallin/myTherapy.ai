<?php

namespace App\Models\Therapist;
use Doctrine\ORM\Mapping as ORM;
use http\Env;

/**
 * @ORM\Entity
 * @ORM\Table(name="therapists")
 */
class Therapist
{
    private const ENCRYPTION_METHOD = 'aes-256-cbc';
    private const ENCRYPTION_KEY = 'f7dc78e5b6b84f4d1564811638c71c0d15e55a6c1486a833883a5d7490e23c64'; // move to env
    private const ENCRYPTION_IV = '54b0c5c109b5d0fb286ec4402c83532f'; //move to env

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $persona;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialization;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $encryptedApiKey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apiEndpoint;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalSettings;

    public function __construct(string $name, string $persona, string $specialization, ?string $apiEndpoint = null, ?string $apiKey = null, ?string $additionalSettings = null)
    {
        $this->name = $name;
        $this->persona = $persona;
        $this->specialization = $specialization;
        $this->apiEndpoint = $apiEndpoint;
        $this->setApiKey($apiKey); // Encrypt and store the API key
        $this->additionalSettings = $additionalSettings;
    }

    // Getters and setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPersona(): string
    {
        return $this->persona;
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    public function getApiEndpoint(): ?string
    {
        return $this->apiEndpoint;
    }

    public function getApiKey(): ?string
    {
        return $this->decryptApiKey($this->encryptedApiKey);
    }

    public function getAdditionalSettings(): ?string
    {
        return $this->additionalSettings;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPersona(string $persona): void
    {
        $this->persona = $persona;
    }

    public function setSpecialization(string $specialization): void
    {
        $this->specialization = $specialization;
    }

    public function setApiEndpoint(?string $apiEndpoint): void
    {
        $this->apiEndpoint = $apiEndpoint;
    }

    public function setApiKey(?string $apiKey): void
    {
        $this->encryptedApiKey = $this->encryptApiKey($apiKey);
    }

    public function setAdditionalSettings(?string $additionalSettings): void
    {
        $this->additionalSettings = $additionalSettings;
    }

    private function encryptApiKey(?string $apiKey): ?string
    {
        if ($apiKey === null) {
            return null;
        }
        return openssl_encrypt($apiKey, self::ENCRYPTION_METHOD, self::ENCRYPTION_KEY, 0, self::ENCRYPTION_IV);
    }

    private function decryptApiKey(?string $encryptedApiKey): ?string
    {
        if ($encryptedApiKey === null) {
            return null;
        }
        return openssl_decrypt($encryptedApiKey, self::ENCRYPTION_METHOD, self::ENCRYPTION_KEY, 0, self::ENCRYPTION_IV);
    }
}

