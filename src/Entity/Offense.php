<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffenseRepository")
 */
class Offense
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="offenses")
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Monster", inversedBy="offensesWhereLeader")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobLeader;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Monster", inversedBy="offensesWhereMobOne")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobOne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Monster", inversedBy="offensesWhereMobTwo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobTwo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Defense", inversedBy="offenses")
     */
    private $defense;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDefense(): ?Defense
    {
        return $this->defense;
    }

    public function setDefense(?Defense $defense): self
    {
        $this->defense = $defense;

        return $this;
    }
}
