<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RankRepository")
 */
class Rank
{
    public function __toString()
    {
        return $this->getName();
    }

    public function getImage()
    {
        $return = '/img/arena/';
        switch($this->name){
            case 'Débutant':
                $return .= 'beginner';
                break;
            case 'F1':
                $return .= 'fighter_1';
                break;
            case 'F2':
                $return .= 'fighter_2';
                break;
            case 'F3':
                $return .= 'fighter_3';
                break;
            case 'C1':
                $return .= 'conqueror_1';
                break;
            case 'C2':
                $return .= 'conqueror_2';
                break;
            case 'C3':
                $return .= 'conqueror_3';
                break;
            case 'G1':
                $return .= 'guardian_1';
                break;
            case 'G2':
                $return .= 'guardian_2';
                break;
            case 'G3':
                $return .= 'guardian_3';
                break;
            case 'Légende':
                $return .= 'legend';
                break;
        }
        return $return . '.webp';
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Scores", mappedBy="bestRTARank")
     */
    private $rtaRanks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Scores", mappedBy="bestArenaRank")
     */
    private $arenaRanks;

    public function __construct()
    {
        $this->rtaRanks = new ArrayCollection();
        $this->arenaRanks = new ArrayCollection();
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

    /**
     * @return Collection|Scores[]
     */
    public function getRtaRanks(): Collection
    {
        return $this->rtaRanks;
    }

    public function addRtaRank(Scores $rtaRank): self
    {
        if (!$this->rtaRanks->contains($rtaRank)) {
            $this->rtaRanks[] = $rtaRank;
            $rtaRank->setBestRTARank($this);
        }

        return $this;
    }

    public function removeRtaRank(Scores $rtaRank): self
    {
        if ($this->rtaRanks->contains($rtaRank)) {
            $this->rtaRanks->removeElement($rtaRank);
            // set the owning side to null (unless already changed)
            if ($rtaRank->getBestRTARank() === $this) {
                $rtaRank->setBestRTARank(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Scores[]
     */
    public function getArenaRanks(): Collection
    {
        return $this->arenaRanks;
    }

    public function addArenaRank(Scores $arenaRank): self
    {
        if (!$this->arenaRanks->contains($arenaRank)) {
            $this->arenaRanks[] = $arenaRank;
            $arenaRank->setBestArenaRank($this);
        }

        return $this;
    }

    public function removeArenaRank(Scores $arenaRank): self
    {
        if ($this->arenaRanks->contains($arenaRank)) {
            $this->arenaRanks->removeElement($arenaRank);
            // set the owning side to null (unless already changed)
            if ($arenaRank->getBestArenaRank() === $this) {
                $arenaRank->setBestArenaRank(null);
            }
        }

        return $this;
    }
}
