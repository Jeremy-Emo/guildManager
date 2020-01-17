<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BuildingsRepository")
 */
class Buildings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="buildings", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $def;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $atk;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $water;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wind;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $light;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dark;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dcc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pv;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $spd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDef(): ?int
    {
        return $this->def;
    }

    public function setDef(?int $def): self
    {
        $this->def = $def;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(?int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getFire(): ?int
    {
        return $this->fire;
    }

    public function setFire(?int $fire): self
    {
        $this->fire = $fire;

        return $this;
    }

    public function getWater(): ?int
    {
        return $this->water;
    }

    public function setWater(?int $water): self
    {
        $this->water = $water;

        return $this;
    }

    public function getWind(): ?int
    {
        return $this->wind;
    }

    public function setWind(?int $wind): self
    {
        $this->wind = $wind;

        return $this;
    }

    public function getLight(): ?int
    {
        return $this->light;
    }

    public function setLight(?int $light): self
    {
        $this->light = $light;

        return $this;
    }

    public function getDark(): ?int
    {
        return $this->dark;
    }

    public function setDark(?int $dark): self
    {
        $this->dark = $dark;

        return $this;
    }

    public function getDcc(): ?int
    {
        return $this->dcc;
    }

    public function setDcc(?int $dcc): self
    {
        $this->dcc = $dcc;

        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(?int $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getSpd(): ?int
    {
        return $this->spd;
    }

    public function setSpd(?int $spd): self
    {
        $this->spd = $spd;

        return $this;
    }
}
