<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AchievementRepository")
 * @HasLifecycleCallbacks
 */
class Achievement
{
    public function getImagePath() : string
    {
        if(strpos($this->image, '.')){
            return '/img/icons/uploads/' . $this->image;
        } else {
            return '/img/icons/' . $this->image . '.png';
        }
    }

    private $temp;

    private $file;

    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        if (isset($this->image)) {
            $this->temp = $this->image;
            $this->image = null;
        } else {
            $this->image = 'initial';
        }
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->image = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }
        $this->getFile()->move($this->getUploadRootDir(), $this->image);
        if (isset($this->temp)) {
            unlink($this->getUploadRootDir().'/'.$this->temp);
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file && strpos($this->image, '.')) {
            unlink($file);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->image
            ? null
            : '/img/icons/'.$this->image;
    }

    public function getWebPath()
    {
        return null === $this->image
            ? null
            : '/img/icons/'.$this->image;
    }

    protected function getUploadRootDir()
    {
        return $_ENV['ABSOLUTE_PATH_FOR_UPLOAD'].'/img/icons/uploads/';
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
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="achievements")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="achivementsInValidation")
     * @ORM\JoinTable(name="users_in_validation")
     */
    private $usersInValidation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AchievementsCategory", mappedBy="achievements")
     */
    private $achievementsCategories;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->usersInValidation = new ArrayCollection();
        $this->achievementsCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsersInValidation(): Collection
    {
        return $this->usersInValidation;
    }

    public function addUsersInValidation(User $usersInValidation): self
    {
        if (!$this->usersInValidation->contains($usersInValidation)) {
            $this->usersInValidation[] = $usersInValidation;
        }

        return $this;
    }

    public function removeUsersInValidation(User $usersInValidation): self
    {
        if ($this->usersInValidation->contains($usersInValidation)) {
            $this->usersInValidation->removeElement($usersInValidation);
        }

        return $this;
    }

    /**
     * @return Collection|AchievementsCategory[]
     */
    public function getAchievementsCategories(): Collection
    {
        return $this->achievementsCategories;
    }

    public function addAchievementsCategory(AchievementsCategory $achievementsCategory): self
    {
        if (!$this->achievementsCategories->contains($achievementsCategory)) {
            $this->achievementsCategories[] = $achievementsCategory;
            $achievementsCategory->addAchievement($this);
        }

        return $this;
    }

    public function removeAchievementsCategory(AchievementsCategory $achievementsCategory): self
    {
        if ($this->achievementsCategories->contains($achievementsCategory)) {
            $this->achievementsCategories->removeElement($achievementsCategory);
            $achievementsCategory->removeAchievement($this);
        }

        return $this;
    }
}
