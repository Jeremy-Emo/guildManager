<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MonsterFamilyRepository")
 */
class MonsterFamily
{
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
     * @ORM\OneToMany(targetEntity="App\Entity\Monster", mappedBy="monsterFamily")
     */
    private $members;

    public function __construct()
    {
        $this->members = new ArrayCollection();
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

    /**
     * @return Collection|Monster[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Monster $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setMonsterFamily($this);
        }

        return $this;
    }

    public function removeMember(Monster $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getMonsterFamily() === $this) {
                $member->setMonsterFamily(null);
            }
        }

        return $this;
    }
}
