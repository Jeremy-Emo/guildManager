<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GuildRepository")
 * @HasLifecycleCallbacks
 */
class Guild
{
    /**
     * @PrePersist
     */
    public function setDefaults(): void
    {
        if ($this->getGvgWarning() === null) {
            $this->setGvgWarning(25);
        }
        if ($this->getGvgCritical() === null) {
            $this->setGvgCritical(20);
        }
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discordLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $websiteLink;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Members", mappedBy="guild")
     */
    private $members;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plusRule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $horaires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gvgDefType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gvgWarning;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gvgCritical;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Siege", mappedBy="guild", orphanRemoval=true)
     */
    private $sieges;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->sieges = new ArrayCollection();
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

    public function getDiscordLink(): ?string
    {
        return $this->discordLink;
    }

    public function setDiscordLink(?string $discordLink): self
    {
        $this->discordLink = $discordLink;

        return $this;
    }

    public function getWebsiteLink(): ?string
    {
        return $this->websiteLink;
    }

    public function setWebsiteLink(?string $websiteLink): self
    {
        $this->websiteLink = $websiteLink;

        return $this;
    }

    /**
     * @return Collection|Members[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Members $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setGuild($this);
        }

        return $this;
    }

    public function removeMember(Members $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getGuild() === $this) {
                $member->setGuild(null);
            }
        }

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getPlusRule(): ?int
    {
        return $this->plusRule;
    }

    public function setPlusRule(?int $plusRule): self
    {
        $this->plusRule = $plusRule;

        return $this;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(?string $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function getGvgDefType(): ?string
    {
        return $this->gvgDefType;
    }

    public function setGvgDefType(?string $gvgDefType): self
    {
        $this->gvgDefType = $gvgDefType;

        return $this;
    }

    public function getGvgWarning(): ?int
    {
        return $this->gvgWarning;
    }

    public function setGvgWarning(?int $gvgWarning): self
    {
        $this->gvgWarning = $gvgWarning;

        return $this;
    }

    public function getGvgCritical(): ?int
    {
        return $this->gvgCritical;
    }

    public function setGvgCritical(?int $gvgCritical): self
    {
        $this->gvgCritical = $gvgCritical;

        return $this;
    }

    /**
     * @return Collection|Siege[]
     */
    public function getSieges(): Collection
    {
        return $this->sieges;
    }

    public function addSiege(Siege $siege): self
    {
        if (!$this->sieges->contains($siege)) {
            $this->sieges[] = $siege;
            $siege->setGuild($this);
        }

        return $this;
    }

    public function removeSiege(Siege $siege): self
    {
        if ($this->sieges->contains($siege)) {
            $this->sieges->removeElement($siege);
            // set the owning side to null (unless already changed)
            if ($siege->getGuild() === $this) {
                $siege->setGuild(null);
            }
        }

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
