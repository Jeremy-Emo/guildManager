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

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gvg_pv;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gvg_dcc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gvg_def;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gvg_atk;

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

    public function getGvgPv(): ?int
    {
        return $this->gvg_pv;
    }

    public function setGvgPv(?int $gvg_pv): self
    {
        $this->gvg_pv = $gvg_pv;

        return $this;
    }

    public function getGvgDcc(): ?int
    {
        return $this->gvg_dcc;
    }

    public function setGvgDcc(?int $gvg_dcc): self
    {
        $this->gvg_dcc = $gvg_dcc;

        return $this;
    }

    public function getGvgDef(): ?int
    {
        return $this->gvg_def;
    }

    public function setGvgDef(?int $gvg_def): self
    {
        $this->gvg_def = $gvg_def;

        return $this;
    }

    public function getGvgAtk(): ?int
    {
        return $this->gvg_atk;
    }

    public function setGvgAtk(?int $gvg_atk): self
    {
        $this->gvg_atk = $gvg_atk;

        return $this;
    }
}
