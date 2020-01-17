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

    public function __toString()
    {
        return $this->getName();
    }
}
