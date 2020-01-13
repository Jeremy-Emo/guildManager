<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoresRepository")
 */
class Scores
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="scores", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gb10;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $db10;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb10;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $toa;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $toah;

    /**
     * @ORM\Column(type="boolean")
     */
    private $r4;

    /**
     * @ORM\Column(type="boolean")
     */
    private $r5;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbSixStars;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minSpeed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getGb10(): ?int
    {
        return $this->gb10;
    }

    public function setGb10(?int $gb10): self
    {
        $this->gb10 = $gb10;

        return $this;
    }

    public function getDb10(): ?int
    {
        return $this->db10;
    }

    public function setDb10(?int $db10): self
    {
        $this->db10 = $db10;

        return $this;
    }

    public function getNb10(): ?int
    {
        return $this->nb10;
    }

    public function setNb10(?int $nb10): self
    {
        $this->nb10 = $nb10;

        return $this;
    }

    public function getToa(): ?int
    {
        return $this->toa;
    }

    public function setToa(?int $toa): self
    {
        $this->toa = $toa;

        return $this;
    }

    public function getToah(): ?int
    {
        return $this->toah;
    }

    public function setToah(?int $toah): self
    {
        $this->toah = $toah;

        return $this;
    }

    public function getR4(): ?bool
    {
        return $this->r4;
    }

    public function setR4(bool $r4): self
    {
        $this->r4 = $r4;

        return $this;
    }

    public function getR5(): ?bool
    {
        return $this->r5;
    }

    public function setR5(bool $r5): self
    {
        $this->r5 = $r5;

        return $this;
    }

    public function getNbSixStars(): ?int
    {
        return $this->nbSixStars;
    }

    public function setNbSixStars(?int $nbSixStars): self
    {
        $this->nbSixStars = $nbSixStars;

        return $this;
    }

    public function getMinSpeed(): ?int
    {
        return $this->minSpeed;
    }

    public function setMinSpeed(?int $minSpeed): self
    {
        $this->minSpeed = $minSpeed;

        return $this;
    }
}
