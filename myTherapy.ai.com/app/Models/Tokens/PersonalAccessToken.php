<?php

namespace App\Models\Tokens;

use Doctrine\ORM\Mapping as ORM;

/**
 * This table is not used and need removing in all places only exsits due to cacheing requireing ti
 *
 * @ORM\Entity
 * @ORM\Table(name="personal_access_tokens")
 */
class PersonalAccessToken
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $tokenableType;

    /**
     * @ORM\Column(type="integer")
     */
    private $tokenableId;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     */
    private $token;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $abilities;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastUsedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $expiresAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

}
