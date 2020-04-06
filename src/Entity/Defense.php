<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DefenseRepository")
 * @HasLifecycleCallbacks
 */
class Defense
{
    /**
     * @PrePersist
     */
    public function setDefaults(): void
    {
        if ($this->getIsExample() === null) {
            $this->setIsExample(false);
        }
    }

    public function getTotalFights(): int
    {
        return $this->getVictories() + $this->getLoses();
    }

    public function getIfFiveStarsDefense(): bool
    {
        if($this->mobLeader->getNaturalStars() !== null && $this->mobOne->getNaturalStars() !== null && $this->mobTwo->getNaturalStars() !== null
            && ($this->mobLeader->getNaturalStars() > 4 || $this->mobOne->getNaturalStars() > 4 || $this->mobTwo->getNaturalStars() > 4)
        ){
            return true;
        }
        return false;
    }

    public function getElementWarning(): bool
    {
        if(
            $this->mobLeader->getElement() !== null && $this->mobOne->getElement() !== null && $this->mobTwo->getElement() !== null
            && (
                $this->mobLeader->getElement() === $this->mobOne->getElement()
                || $this->mobLeader->getElement() === $this->mobTwo->getElement()
                || $this->mobOne->getElement() === $this->mobTwo->getElement()
            )
        ){
            return true;
        }
        return false;
    }

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

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $detail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isExample;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offense", mappedBy="defense")
     */
    private $offenses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnemyGuild", inversedBy="defenses")
     */
    private $enemyGuild;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $enemyName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SiegeTowers", inversedBy="defenses")
     */
    private $siegeTowers;

    public function __construct()
    {
        $this->offenses = new ArrayCollection();
    }

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

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getIsExample(): ?bool
    {
        return $this->isExample;
    }

    public function setIsExample(bool $isExample): self
    {
        $this->isExample = $isExample;

        return $this;
    }

    /**
     * @return Collection|Offense[]
     */
    public function getOffenses(): Collection
    {
        return $this->offenses;
    }

    public function addOffense(Offense $offense): self
    {
        if (!$this->offenses->contains($offense)) {
            $this->offenses[] = $offense;
            $offense->setDefense($this);
        }

        return $this;
    }

    public function removeOffense(Offense $offense): self
    {
        if ($this->offenses->contains($offense)) {
            $this->offenses->removeElement($offense);
            // set the owning side to null (unless already changed)
            if ($offense->getDefense() === $this) {
                $offense->setDefense(null);
            }
        }

        return $this;
    }

    public function getEnemyGuild(): ?EnemyGuild
    {
        return $this->enemyGuild;
    }

    public function setEnemyGuild(?EnemyGuild $enemyGuild): self
    {
        $this->enemyGuild = $enemyGuild;

        return $this;
    }

    public function getEnemyName(): ?string
    {
        return $this->enemyName;
    }

    public function setEnemyName(?string $enemyName): self
    {
        $this->enemyName = $enemyName;

        return $this;
    }

    public function getSiegeTowers(): ?SiegeTowers
    {
        return $this->siegeTowers;
    }

    public function setSiegeTowers(?SiegeTowers $siegeTowers): self
    {
        $this->siegeTowers = $siegeTowers;

        return $this;
    }
}
