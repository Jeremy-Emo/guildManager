<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnemyGuildRepository")
 * @HasLifecycleCallbacks
 */
class EnemyGuild
{
    /**
     * @PrePersist
     */
    public function setDefaults(): void
    {
        if ($this->getLastGvOBattle() === null) {
            $this->setLastGvOBattle(new DateTime("now"));
        }
    }

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
     * @ORM\Column(type="date")
     */
    private $lastGvOBattle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Defense", mappedBy="enemyGuild")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastGvOBattle(): ?\DateTimeInterface
    {
        return $this->lastGvOBattle;
    }

    public function setLastGvOBattle(\DateTimeInterface $lastGvOBattle): self
    {
        $this->lastGvOBattle = $lastGvOBattle;

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
            $defense->setEnemyGuild($this);
        }

        return $this;
    }

    public function removeDefense(Defense $defense): self
    {
        if ($this->defenses->contains($defense)) {
            $this->defenses->removeElement($defense);
            // set the owning side to null (unless already changed)
            if ($defense->getEnemyGuild() === $this) {
                $defense->setEnemyGuild(null);
            }
        }

        return $this;
    }
}
