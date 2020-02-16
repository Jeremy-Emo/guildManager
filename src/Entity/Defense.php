<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DefenseRepository")
 */
class Defense
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="defenses")
     */
    private $owner;

    /**
     * @ORM\Column(type="integer")
     */
    private $victories;

    /**
     * @ORM\Column(type="integer")
     */
    private $loses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Monster", inversedBy="defensesWhereLeader")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobLeader;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Monster", inversedBy="defensesWhereMobOne")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobOne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Monster", inversedBy="defensesWhereMobTwo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobTwo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getVictories(): ?int
    {
        return $this->victories;
    }

    public function setVictories(int $victories): self
    {
        $this->victories = $victories;

        return $this;
    }

    public function getLoses(): ?int
    {
        return $this->loses;
    }

    public function setLoses(int $loses): self
    {
        $this->loses = $loses;

        return $this;
    }

    public function getMobLeader(): ?Monster
    {
        return $this->mobLeader;
    }

    public function setMobLeader(?Monster $mobLeader): self
    {
        $this->mobLeader = $mobLeader;

        return $this;
    }

    public function getMobOne(): ?Monster
    {
        return $this->mobOne;
    }

    public function setMobOne(?Monster $mobOne): self
    {
        $this->mobOne = $mobOne;

        return $this;
    }

    public function getMobTwo(): ?Monster
    {
        return $this->mobTwo;
    }

    public function setMobTwo(?Monster $mobTwo): self
    {
        $this->mobTwo = $mobTwo;

        return $this;
    }
}
