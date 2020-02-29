<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MonsterRepository")
 */
class Monster
{
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Defense", mappedBy="mobLeader", orphanRemoval=true)
     */
    private $defensesWhereLeader;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Defense", mappedBy="mobOne", orphanRemoval=true)
     */
    private $defensesWhereMobOne;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Defense", mappedBy="mobTwo", orphanRemoval=true)
     */
    private $defensesWhereMobTwo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offense", mappedBy="mobLeader", orphanRemoval=true)
     */
    private $offensesWhereLeader;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offense", mappedBy="mobOne", orphanRemoval=true)
     */
    private $offensesWhereMobOne;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offense", mappedBy="mobTwo", orphanRemoval=true)
     */
    private $offensesWhereMobTwo;

    public function __construct()
    {
        $this->defensesWhereLeader = new ArrayCollection();
        $this->defensesWhereMobOne = new ArrayCollection();
        $this->defensesWhereMobTwo = new ArrayCollection();
        $this->offensesWhereLeader = new ArrayCollection();
        $this->offensesWhereMobOne = new ArrayCollection();
        $this->offensesWhereMobTwo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Defense[]
     */
    public function getDefensesWhereLeader(): Collection
    {
        return $this->defensesWhereLeader;
    }

    public function addDefensesWhereLeader(Defense $defensesWhereLeader): self
    {
        if (!$this->defensesWhereLeader->contains($defensesWhereLeader)) {
            $this->defensesWhereLeader[] = $defensesWhereLeader;
            $defensesWhereLeader->setMobLeader($this);
        }

        return $this;
    }

    public function removeDefensesWhereLeader(Defense $defensesWhereLeader): self
    {
        if ($this->defensesWhereLeader->contains($defensesWhereLeader)) {
            $this->defensesWhereLeader->removeElement($defensesWhereLeader);
            // set the owning side to null (unless already changed)
            if ($defensesWhereLeader->getMobLeader() === $this) {
                $defensesWhereLeader->setMobLeader(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Defense[]
     */
    public function getDefensesWhereMobOne(): Collection
    {
        return $this->defensesWhereMobOne;
    }

    public function addDefensesWhereMobOne(Defense $defensesWhereMobOne): self
    {
        if (!$this->defensesWhereMobOne->contains($defensesWhereMobOne)) {
            $this->defensesWhereMobOne[] = $defensesWhereMobOne;
            $defensesWhereMobOne->setMobOne($this);
        }

        return $this;
    }

    public function removeDefensesWhereMobOne(Defense $defensesWhereMobOne): self
    {
        if ($this->defensesWhereMobOne->contains($defensesWhereMobOne)) {
            $this->defensesWhereMobOne->removeElement($defensesWhereMobOne);
            // set the owning side to null (unless already changed)
            if ($defensesWhereMobOne->getMobOne() === $this) {
                $defensesWhereMobOne->setMobOne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Defense[]
     */
    public function getDefensesWhereMobTwo(): Collection
    {
        return $this->defensesWhereMobTwo;
    }

    public function addDefensesWhereMobTwo(Defense $defensesWhereMobTwo): self
    {
        if (!$this->defensesWhereMobTwo->contains($defensesWhereMobTwo)) {
            $this->defensesWhereMobTwo[] = $defensesWhereMobTwo;
            $defensesWhereMobTwo->setMobTwo($this);
        }

        return $this;
    }

    public function removeDefensesWhereMobTwo(Defense $defensesWhereMobTwo): self
    {
        if ($this->defensesWhereMobTwo->contains($defensesWhereMobTwo)) {
            $this->defensesWhereMobTwo->removeElement($defensesWhereMobTwo);
            // set the owning side to null (unless already changed)
            if ($defensesWhereMobTwo->getMobTwo() === $this) {
                $defensesWhereMobTwo->setMobTwo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Offense[]
     */
    public function getOffensesWhereLeader(): Collection
    {
        return $this->offensesWhereLeader;
    }

    public function addOffensesWhereLeader(Offense $offensesWhereLeader): self
    {
        if (!$this->offensesWhereLeader->contains($offensesWhereLeader)) {
            $this->offensesWhereLeader[] = $offensesWhereLeader;
            $offensesWhereLeader->setMobLeader($this);
        }

        return $this;
    }

    public function removeOffensesWhereLeader(Offense $offensesWhereLeader): self
    {
        if ($this->offensesWhereLeader->contains($offensesWhereLeader)) {
            $this->offensesWhereLeader->removeElement($offensesWhereLeader);
            // set the owning side to null (unless already changed)
            if ($offensesWhereLeader->getMobLeader() === $this) {
                $offensesWhereLeader->setMobLeader(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Offense[]
     */
    public function getOffensesWhereMobOne(): Collection
    {
        return $this->offensesWhereMobOne;
    }

    public function addOffensesWhereMobOne(Offense $offensesWhereMobOne): self
    {
        if (!$this->offensesWhereMobOne->contains($offensesWhereMobOne)) {
            $this->offensesWhereMobOne[] = $offensesWhereMobOne;
            $offensesWhereMobOne->setMobOne($this);
        }

        return $this;
    }

    public function removeOffensesWhereMobOne(Offense $offensesWhereMobOne): self
    {
        if ($this->offensesWhereMobOne->contains($offensesWhereMobOne)) {
            $this->offensesWhereMobOne->removeElement($offensesWhereMobOne);
            // set the owning side to null (unless already changed)
            if ($offensesWhereMobOne->getMobOne() === $this) {
                $offensesWhereMobOne->setMobOne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Offense[]
     */
    public function getOffensesWhereMobTwo(): Collection
    {
        return $this->offensesWhereMobTwo;
    }

    public function addOffensesWhereMobTwo(Offense $offensesWhereMobTwo): self
    {
        if (!$this->offensesWhereMobTwo->contains($offensesWhereMobTwo)) {
            $this->offensesWhereMobTwo[] = $offensesWhereMobTwo;
            $offensesWhereMobTwo->setMobTwo($this);
        }

        return $this;
    }

    public function removeOffensesWhereMobTwo(Offense $offensesWhereMobTwo): self
    {
        if ($this->offensesWhereMobTwo->contains($offensesWhereMobTwo)) {
            $this->offensesWhereMobTwo->removeElement($offensesWhereMobTwo);
            // set the owning side to null (unless already changed)
            if ($offensesWhereMobTwo->getMobTwo() === $this) {
                $offensesWhereMobTwo->setMobTwo(null);
            }
        }

        return $this;
    }
}
