<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartTwoFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $mobs = [
            [
                'name' => 'Colleen',
                'img' => 'colleen',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Konamiya',
                'img' => 'konamiya',
                'family' => $this->getReference("garuda"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Lulu',
                'img' => 'lulu',
                'family' => $this->getReference("howl"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Shannon',
                'img' => 'shannon',
                'family' => $this->getReference("lutin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sieq',
                'img' => 'sieq',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Tarq',
                'img' => 'tarq',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Taru',
                'img' => 'taru',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Shushu',
                'img' => 'shushu',
                'family' => $this->getReference("howl"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Gamir',
                'img' => 'gamir',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Shamar',
                'img' => 'shamar',
                'family' => $this->getReference("cerbere"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Allen',
                'img' => 'allen',
                'family' => $this->getReference("vagabond"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Roid',
                'img' => 'roid',
                'family' => $this->getReference("vagabond"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Chacha',
                'img' => 'chacha',
                'family' => $this->getReference("howl"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Chichi',
                'img' => 'chichi',
                'family' => $this->getReference("howl"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Lala',
                'img' => 'lala',
                'family' => $this->getReference("howl"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Rizak',
                'img' => 'rizak',
                'family' => $this->getReference("garuda"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lindermen',
                'img' => 'lindermen',
                'family' => $this->getReference("garuda"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Cahule',
                'img' => 'cahule',
                'family' => $this->getReference("garuda"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Huga',
                'img' => 'huga',
                'family' => $this->getReference("viking"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Jansson',
                'img' => 'jansson',
                'family' => $this->getReference("viking"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Walter',
                'img' => 'walter',
                'family' => $this->getReference("viking"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Arkajan',
                'img' => 'arkajan',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Cogma',
                'img' => 'cogma',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Fynn',
                'img' => 'fynn',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Garok',
                'img' => 'garok',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Kunda',
                'img' => 'kunda',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Rakaja',
                'img' => 'rakaja',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Ralph',
                'img' => 'ralph',
                'family' => $this->getReference("diablotin"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tantra',
                'img' => 'tantra',
                'family' => $this->getReference("yeti"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Bremis',
                'img' => 'bremis',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Daharenos',
                'img' => 'daharenos',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Taharus',
                'img' => 'taharus',
                'family' => $this->getReference("elementaire"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Seal',
                'img' => 'seal',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sisroo',
                'img' => 'sisroo',
                'family' => $this->getReference("harpu"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Kaimann',
                'img' => 'kaimann',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Decamaron',
                'img' => 'decamaron',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lukan',
                'img' => 'lukan',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Sharman',
                'img' => 'sharman',
                'family' => $this->getReference("salamandre"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];


        foreach ($mobs as $twoStar) {
            $mon = new Monster();
            $mon->setName($twoStar['name'])->setImage('/img/2nat/' . $twoStar['img'] . '.png')->setNaturalStars(2);
            if(isset($twoStar['family'])){
                $mon->setMonsterFamily($twoStar['family']);
            }
            if(isset($twoStar['element'])){
                $mon->setElement($twoStar['element']);
            }
            $manager->persist($mon);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'part2'];
    }

    public function getDependencies()
    {
        return array(
            FamilyFixtures::class,
            ElementsFixtures::class
        );
    }
}