<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class TestEntity
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function __construct()
    {
        $this->id = rand(0, 1000);
    }

    public function getId()
    {
        return $this->id;
    }
}
