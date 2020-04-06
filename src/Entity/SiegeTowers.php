<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SiegeTowersRepository")
 */
class SiegeTowers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Defense", mappedBy="siegeTowers")
     */
    private $defenses;

    public function __construct()
    {
        $this->defenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection|Defense[]
     */
    public function getDefenses(): Collection
    {
        return $this->defenses;
    }

    public function addDefense(Defense $defense): self
    {
        if (!$this->defenses->contains($defense)) {
            $this->defenses[] = $defense;
            $defense->setSiegeTowers($this);
        }

        return $this;
    }

    public function removeDefense(Defense $defense): self
    {
        if ($this->defenses->contains($defense)) {
            $this->defenses->removeElement($defense);
            // set the owning side to null (unless already changed)
            if ($defense->getSiegeTowers() === $this) {
                $defense->setSiegeTowers(null);
            }
        }

        return $this;
    }
}
