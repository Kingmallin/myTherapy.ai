<?php

namespace App\Models\Cache;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cache")
 */
class CacheEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $key;

    /**
     * @ORM\Column(type="text")
     */
    private $value;

    /**
     * @ORM\Column(type="integer")
     */
    private $expiration;

}
