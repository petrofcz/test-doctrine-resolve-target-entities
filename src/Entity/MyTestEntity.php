<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class MyTestEntity extends TestEntity
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $customProp;

    public function __construct()
    {
        parent::__construct();
        $this->customProp = rand(0, 1000);
    }

    public function getCustomProp(): int
    {
        return $this->customProp;
    }
}
