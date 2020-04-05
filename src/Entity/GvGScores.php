<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GvGScoresRepository")
 * @HasLifecycleCallbacks
 */
class GvGScores
{
    /**
     * @PrePersist
     */
    public function setDefaults(): void
    {
        if ($this->getYear() === null) {
            $this->setYear(date("Y"));
        }
        if ($this->getSemaine() === null) {
            $this->setSemaine(date("W"));
        }
    }

    public function getColor(): string
    {
        $critical = $this->getUser()->getGuild()->getGvgCritical() ?? 20;
        $warning = $this->getUser()->getGuild()->getGvgWarning() ?? 25;
        if($this->attackNumber < $critical) {
            return 'rgba(255, 0, 0, 0.1)';
        }
        if($this->attackNumber < $warning) {
            return 'rgba(255, 175, 0, 0.1)';
        }
        return 'rgba(0, 204, 0, 0.1)';
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Members", inversedBy="gvGScores")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $semaine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $attackNumber;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Members
    {
        return $this->user;
    }

    public function setUser(?Members $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(int $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }

    public function getAttackNumber(): ?int
    {
        return $this->attackNumber;
    }

    public function setAttackNumber(?int $attackNumber): self
    {
        $this->attackNumber = $attackNumber;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
