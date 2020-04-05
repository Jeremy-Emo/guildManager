<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SiegeRepository")
 */
class Siege
{
    public function getPlaceText() : string
    {
        switch ($this->place){
            case 1:
                return '1er';
            case 2:
                return '2e';
            case 3:
                return '3e';
            default:
                return 'En cours';
        }
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnemyGuild")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enemyGuildOne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnemyGuild")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enemyGuildTwo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Guild", inversedBy="sieges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $guild;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rank")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rank;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $place;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEnemyGuildOne(): ?EnemyGuild
    {
        return $this->enemyGuildOne;
    }

    public function setEnemyGuildOne(?EnemyGuild $enemyGuildOne): self
    {
        $this->enemyGuildOne = $enemyGuildOne;

        return $this;
    }

    public function getEnemyGuildTwo(): ?EnemyGuild
    {
        return $this->enemyGuildTwo;
    }

    public function setEnemyGuildTwo(?EnemyGuild $enemyGuildTwo): self
    {
        $this->enemyGuildTwo = $enemyGuildTwo;

        return $this;
    }

    public function getGuild(): ?Guild
    {
        return $this->guild;
    }

    public function setGuild(?Guild $guild): self
    {
        $this->guild = $guild;

        return $this;
    }

    public function getRank(): ?Rank
    {
        return $this->rank;
    }

    public function setRank(?Rank $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(?int $place): self
    {
        $this->place = $place;

        return $this;
    }
}
