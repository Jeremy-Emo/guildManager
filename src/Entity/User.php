<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @HasLifecycleCallbacks
 */
class User implements UserInterface
{
    /**
     * @PrePersist
     */
    public function setDefaults(): void
    {
        if ($this->getIsAdmin() === null) {
            $this->setIsAdmin(false);
        }
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $swarfarm;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAdmin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Members", mappedBy="user", cascade={"persist", "remove"})
     */
    private $member;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Scores", mappedBy="user", cascade={"persist", "remove"})
     */
    private $scores;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", mappedBy="inscrits")
     */
    private $events;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastVisitAt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Buildings", mappedBy="user", cascade={"persist", "remove"})
     */
    private $buildings;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSwarfarm(): ?string
    {
        return $this->swarfarm;
    }

    public function setSwarfarm(?string $swarfarm): self
    {
        $this->swarfarm = $swarfarm;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function getMember(): ?Members
    {
        return $this->member;
    }

    public function setMember(Members $member): self
    {
        $this->member = $member;

        // set the owning side of the relation if necessary
        if ($member->getUser() !== $this) {
            $member->setUser($this);
        }

        return $this;
    }

    public function getScores(): ?Scores
    {
        return $this->scores;
    }

    public function setScores(Scores $scores): self
    {
        $this->scores = $scores;

        // set the owning side of the relation if necessary
        if ($scores->getUser() !== $this) {
            $scores->setUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addInscrit($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            $event->removeInscrit($this);
        }

        return $this;
    }

    public function getLastVisitAt(): ?\DateTimeInterface
    {
        return $this->lastVisitAt;
    }

    public function setLastVisitAt(?\DateTimeInterface $lastVisitAt): self
    {
        $this->lastVisitAt = $lastVisitAt;

        return $this;
    }

    public function getBuildings(): ?Buildings
    {
        return $this->buildings;
    }

    public function setBuildings(?Buildings $buildings): self
    {
        $this->buildings = $buildings;

        // set (or unset) the owning side of the relation if necessary
        $newUser = null === $buildings ? null : $this;
        if ($buildings->getUser() !== $newUser) {
            $buildings->setUser($newUser);
        }

        return $this;
    }
}
