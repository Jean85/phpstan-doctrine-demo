<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\FooEntityRepository")
 */
class FooEntity
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private $bar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBar(): ?string
    {
        return $this->bar;
    }

    public function setBar(?string $bar): void
    {
        $this->bar = $bar;
    }
}
