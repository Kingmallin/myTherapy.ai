<?php

namespace App\Models\EmergencyHelp;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="emergency_help")
 */
class EmergencyHelp
{
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
     * @ORM\Column(type="string", length=20)
     */
    private $contactNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addressLine1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressLine2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressLine3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressLine4;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $webLink;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function __construct(
        string $name,
        string $contactNumber,
        string $addressLine1,
        string $postcode,
        string $service,
        ?string $webLink = null,
        ?string $addressLine2 = null,
        ?string $addressLine3 = null,
        ?string $addressLine4 = null,
        ?string $description = null
    ) {
        $this->name = $name;
        $this->contactNumber = $contactNumber;
        $this->addressLine1 = $addressLine1;
        $this->postcode = $postcode;
        $this->service = $service;
        $this->webLink = $webLink;
        $this->addressLine2 = $addressLine2;
        $this->addressLine3 = $addressLine3;
        $this->addressLine4 = $addressLine4;
        $this->description = $description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getContactNumber(): ?string
    {
        return $this->contactNumber;
    }

    public function setContactNumber(string $contactNumber): void
    {
        $this->contactNumber = $contactNumber;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(string $addressLine1): void
    {
        $this->addressLine1 = $addressLine1;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(string $addressLine2): void
    {
        $this->addressLine2 = $addressLine2;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function setAddressLine3(string $addressLine3): void
    {
        $this->addressLine2 = $addressLine3;
    }

    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    public function setAddressLine4(string $addressLine4): void
    {
        $this->addressLine2 = $addressLine4;
    }

    public function getWeblink()
    {
        return $this->webLink;
    }

    public function setWeblink($weblink)
    {
        $this->webLink = $weblink;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPostCode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getPostCode()
    {
        return $this->postcode;
    }
}

