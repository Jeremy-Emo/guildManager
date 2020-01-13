<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GvGScoresRepository")
 */
class GvGScores
{
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
     * @ORM\Column(type="date")
     */
    private $semaine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $attackNumber;

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

    public function getSemaine(): ?\DateTimeInterface
    {
        return $this->semaine;
    }

    public function setSemaine(\DateTimeInterface $semaine): self
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
}
