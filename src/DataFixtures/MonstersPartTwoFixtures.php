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
        $twoStars = [
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
        ];


        foreach ($twoStars as $twoStar) {
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

        $threeStars = [
            [
                'name' => 'Lucasha',
                'img' => 'lucasha',
                'family' => $this->getReference("harpie"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Calicus',
                'img' => 'calicus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Cassie',
                'img' => 'cassie',
                'family' => $this->getReference("cowgirl"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Gina',
                'img' => 'gina',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Linda',
                'img' => 'linda',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Silia',
                'img' => 'silia',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Rebecca',
                'img' => 'rebecca',
                'family' => $this->getReference("sorciereMystique"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Prom',
                'img' => 'prom',
                'family' => $this->getReference("faucheuse"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Rumicus',
                'img' => 'rumicus',
                'family' => $this->getReference("requinCoursier"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Elpuria',
                'img' => 'elpuria',
                'family' => $this->getReference("serpent"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Kai\'en',
                'img' => 'kaien',
                'family' => $this->getReference("vagabond"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Michelle',
                'img' => 'michelle',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Rachid',
                'img' => 'rachid',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_DARK")
            ],
        ];


        foreach ($threeStars as $threeStar) {
            $mon = new Monster();
            $mon->setName($threeStar['name'])->setImage('/img/3nat/' . $threeStar['img'] . '.png')->setNaturalStars(3);
            if(isset($threeStar['family'])){
                $mon->setMonsterFamily($threeStar['family']);
            }
            if(isset($threeStar['element'])){
                $mon->setElement($threeStar['element']);
            }
            $manager->persist($mon);
        }


        $fourStars = [
            [
                'name' => 'Iona',
                'img' => 'iona',
                'family' => $this->getReference("pretreEpikion"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/' . $fourStar['img'] . '.png')->setNaturalStars(4);
            if(isset($fourStar['family'])){
                $mon->setMonsterFamily($fourStar['family']);
            }
            if(isset($fourStar['element'])){
                $mon->setElement($fourStar['element']);
            }
            $manager->persist($mon);
        }


        $fiveStars = [
            [
                'name' => 'Elsharion',
                'img' => 'elsharion',
                'family' => $this->getReference("ifrit"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
        ];

        foreach ($fiveStars as $fiveStar) {
            $mon = new Monster();
            $mon->setName($fiveStar['name'])->setImage('/img/5nat/' . $fiveStar['img'] . '.png')->setNaturalStars(5);
            if(isset($fiveStar['family'])){
                $mon->setMonsterFamily($fiveStar['family']);
            }
            if(isset($fiveStar['element'])){
                $mon->setElement($fiveStar['element']);
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