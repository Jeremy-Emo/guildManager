<?php

namespace App\Entity;

use DateTimeInterface;
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
        if($this->getNeverLogged() === null) {
            $this->neverLogged = true;
        }
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    public function countNatFourDefenses(): int
    {
        $count = 0;
        foreach($this->defenses as $defense){
            if(!$defense->getIfFiveStarsDefense()){
                $count ++;
            }
        }
        return $count;
    }

    public function countNatFiveDefenses(): int
    {
        $count = 0;
        foreach($this->defenses as $defense){
            if($defense->getIfFiveStarsDefense()){
                $count ++;
            }
        }
        return $count;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="owner")
     */
    private $myEvents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Defense", mappedBy="owner")
     */
    private $defenses;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Achievement", mappedBy="users")
     */
    private $achievements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offense", mappedBy="owner")
     */
    private $offenses;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discordTag;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Achievement", mappedBy="usersInValidation")
     * @ORM\JoinTable(name="users_in_validation")
     */
    private $achivementsInValidation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\WishlistCategory", mappedBy="user")
     */
    private $wishlistCategories;

    /**
     * @ORM\Column(type="boolean")
     */
    private $neverLogged;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->myEvents = new ArrayCollection();
        $this->defenses = new ArrayCollection();
        $this->achievements = new ArrayCollection();
        $this->offenses = new ArrayCollection();
        $this->achivementsInValidation = new ArrayCollection();
        $this->wishlistCategories = new ArrayCollection();
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

    public function addRole(string $role) : self
    {
        $this->roles[] = $role;

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

    public function getLastVisitAt(): ?DateTimeInterface
    {
        return $this->lastVisitAt;
    }

    public function setLastVisitAt(?DateTimeInterface $lastVisitAt): self
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

    /**
     * @return Collection|Event[]
     */
    public function getMyEvents(): Collection
    {
        return $this->myEvents;
    }

    public function addMyEvent(Event $myEvent): self
    {
        if (!$this->myEvents->contains($myEvent)) {
            $this->myEvents[] = $myEvent;
            $myEvent->setOwner($this);
        }

        return $this;
    }

    public function removeMyEvent(Event $myEvent): self
    {
        if ($this->myEvents->contains($myEvent)) {
            $this->myEvents->removeElement($myEvent);
            // set the owning side to null (unless already changed)
            if ($myEvent->getOwner() === $this) {
                $myEvent->setOwner(null);
            }
        }

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
            $defense->setOwner($this);
        }

        return $this;
    }

    public function removeDefense(Defense $defense): self
    {
        if ($this->defenses->contains($defense)) {
            $this->defenses->removeElement($defense);
            // set the owning side to null (unless already changed)
            if ($defense->getOwner() === $this) {
                $defense->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Achievement[]
     */
    public function getAchievements(): Collection
    {
        return $this->achievements;
    }

    public function addAchievement(Achievement $achievement): self
    {
        if (!$this->achievements->contains($achievement)) {
            $this->achievements[] = $achievement;
            $achievement->addUser($this);
        }

        return $this;
    }

    public function removeAchievement(Achievement $achievement): self
    {
        if ($this->achievements->contains($achievement)) {
            $this->achievements->removeElement($achievement);
            $achievement->removeUser($this);
        }

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
            $offense->setOwner($this);
        }

        return $this;
    }

    public function removeOffense(Offense $offense): self
    {
        if ($this->offenses->contains($offense)) {
            $this->offenses->removeElement($offense);
            // set the owning side to null (unless already changed)
            if ($offense->getOwner() === $this) {
                $offense->setOwner(null);
            }
        }

        return $this;
    }

    public function getDiscordTag(): ?string
    {
        return $this->discordTag;
    }

    public function setDiscordTag(?string $discordTag): self
    {
        $this->discordTag = $discordTag;

        return $this;
    }

    /**
     * @return Collection|Achievement[]
     */
    public function getAchivementsInValidation(): Collection
    {
        return $this->achivementsInValidation;
    }

    public function addAchivementsInValidation(Achievement $achivementsInValidation): self
    {
        if (!$this->achivementsInValidation->contains($achivementsInValidation)) {
            $this->achivementsInValidation[] = $achivementsInValidation;
            $achivementsInValidation->addUsersInValidation($this);
        }

        return $this;
    }

    public function removeAchivementsInValidation(Achievement $achivementsInValidation): self
    {
        if ($this->achivementsInValidation->contains($achivementsInValidation)) {
            $this->achivementsInValidation->removeElement($achivementsInValidation);
            $achivementsInValidation->removeUsersInValidation($this);
        }

        return $this;
    }

    /**
     * @return Collection|WishlistCategory[]
     */
    public function getWishlistCategories(): Collection
    {
        return $this->wishlistCategories;
    }

    public function addWishlistCategory(WishlistCategory $wishlistCategory): self
    {
        if (!$this->wishlistCategories->contains($wishlistCategory)) {
            $this->wishlistCategories[] = $wishlistCategory;
            $wishlistCategory->setUser($this);
        }

        return $this;
    }

    public function removeWishlistCategory(WishlistCategory $wishlistCategory): self
    {
        if ($this->wishlistCategories->contains($wishlistCategory)) {
            $this->wishlistCategories->removeElement($wishlistCategory);
            // set the owning side to null (unless already changed)
            if ($wishlistCategory->getUser() === $this) {
                $wishlistCategory->setUser(null);
            }
        }

        return $this;
    }

    public function getNeverLogged(): ?bool
    {
        return $this->neverLogged;
    }

    public function setNeverLogged(bool $neverLogged): self
    {
        $this->neverLogged = $neverLogged;

        return $this;
    }
}
