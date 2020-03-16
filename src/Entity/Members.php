<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembersRepository")
 * @HasLifecycleCallbacks
 */
class Members
{
    /**
     * @PrePersist
     */
    public function setDefaults(): void
    {
        if ($this->getIsInGvG() === null) {
            $this->setIsInGvG(false);
        }
        if ($this->getIsInGvO() === null) {
            $this->setIsInGvO(false);
        }
        if ($this->getIsLeader() === null) {
            $this->setIsLeader(false);
        }
    }

    public function __toString()
    {
        return $this->getUser()->getUsername();
    }

    public function getCritical()
    {
        $score = $this->getGvGScores()->last();
        if($score === null || $score === false){
            return false;
        }
        if($score->getAttackNumber() < 20) {
            return 'red';
        }
        if($score->getAttackNumber() < 25) {
            return 'orange';
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
     * @ORM\Column(type="boolean")
     */
    private $isLeader;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="member", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Guild", inversedBy="members")
     * @ORM\JoinColumn(nullable=false)
     */
    private $guild;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isInGvG;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isInGvO;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GvGScores", mappedBy="user", cascade={"remove"})
     */
    private $gvGScores;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $leadersNote;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $baseNote;

    public function __construct()
    {
        $this->gvGScores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsLeader(): ?bool
    {
        return $this->isLeader;
    }

    public function setIsLeader(bool $isLeader): self
    {
        $this->isLeader = $isLeader;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getGuild(): ?Guild
    {
        return $this->guild;
    }

    public function setGuild(?Guild $guild): self
    {
        $this->guild = $guild;

        return $this;
    }

    public function getIsInGvG(): ?bool
    {
        return $this->isInGvG;
    }

    public function setIsInGvG(bool $isInGvG): self
    {
        $this->isInGvG = $isInGvG;

        return $this;
    }

    public function getIsInGvO(): ?bool
    {
        return $this->isInGvO;
    }

    public function setIsInGvO(bool $isInGvO): self
    {
        $this->isInGvO = $isInGvO;

        return $this;
    }

    /**
     * @return Collection|GvGScores[]
     */
    public function getGvGScores(): Collection
    {
        return $this->gvGScores;
    }

    public function addGvGScore(GvGScores $gvGScore): self
    {
        if (!$this->gvGScores->contains($gvGScore)) {
            $this->gvGScores[] = $gvGScore;
            $gvGScore->setUser($this);
        }

        return $this;
    }

    public function removeGvGScore(GvGScores $gvGScore): self
    {
        if ($this->gvGScores->contains($gvGScore)) {
            $this->gvGScores->removeElement($gvGScore);
            // set the owning side to null (unless already changed)
            if ($gvGScore->getUser() === $this) {
                $gvGScore->setUser(null);
            }
        }

        return $this;
    }

    public function getLeadersNote(): ?string
    {
        return $this->leadersNote;
    }

    public function setLeadersNote(?string $leadersNote): self
    {
        $this->leadersNote = $leadersNote;

        return $this;
    }

    public function getBaseNote(): ?string
    {
        return $this->baseNote;
    }

    public function setBaseNote(?string $baseNote): self
    {
        $this->baseNote = $baseNote;

        return $this;
    }
}
