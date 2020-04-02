<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MonsterRepository")
 * @HasLifecycleCallbacks
 */
class Monster
{
    public function __toString()
    {
        return $this->name;
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
            $this->image = '/img/icons/uploads/'.$filename.'.'.$this->getFile()->guessExtension();
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MonsterFamily", inversedBy="members", cascade={"persist", "remove"})
     */
    private $monsterFamily;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Element", inversedBy="monsters", cascade={"persist", "remove"})
     */
    private $element;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $naturalStars;

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

    public function getMonsterFamily(): ?MonsterFamily
    {
        return $this->monsterFamily;
    }

    public function setMonsterFamily(?MonsterFamily $monsterFamily): self
    {
        $this->monsterFamily = $monsterFamily;

        return $this;
    }

    public function getElement(): ?Element
    {
        return $this->element;
    }

    public function setElement(?Element $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getNaturalStars(): ?int
    {
        return $this->naturalStars;
    }

    public function setNaturalStars(?int $naturalStars): self
    {
        $this->naturalStars = $naturalStars;

        return $this;
    }
}
