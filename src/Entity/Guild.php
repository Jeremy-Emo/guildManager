<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GuildRepository")
 */
class Guild
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
}
