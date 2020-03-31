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
            ],
            [
                'name' => 'Gamir',
                'img' => 'gamir',
            ],
            [
                'name' => 'Shamar',
                'img' => 'shamar',
            ],
            [
                'name' => 'Allen',
                'img' => 'allen',
            ],
            [
                'name' => 'Roid',
                'img' => 'roid',
            ],
            [
                'name' => 'Chacha',
                'img' => 'chacha',
            ],
            [
                'name' => 'Chichi',
                'img' => 'chichi',
            ],
            [
                'name' => 'Lala',
                'img' => 'lala',
            ],
            [
                'name' => 'Rizak',
                'img' => 'rizak',
            ],
            [
                'name' => 'Lindermen',
                'img' => 'lindermen',
            ],
            [
                'name' => 'Cahule',
                'img' => 'cahule',
            ],
        ];


        foreach ($twoStars as $twoStar) {
            $mon = new Monster();
            $mon->setName($twoStar['name'])->setImage('/img/2nat/' . $twoStar['img'] . '.png');
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
            ],
            [
                'name' => 'Calicus',
                'img' => 'calicus',
            ],
            [
                'name' => 'Cassie',
                'img' => 'cassie',
            ],
            [
                'name' => 'Gina',
                'img' => 'gina',
            ],
            [
                'name' => 'Linda',
                'img' => 'linda',
            ],
            [
                'name' => 'Silia',
                'img' => 'silia',
            ],
            [
                'name' => 'Rebecca',
                'img' => 'rebecca',
            ],
            [
                'name' => 'Prom',
                'img' => 'prom',
            ],
            [
                'name' => 'Rumicus',
                'img' => 'rumicus',
            ],
            [
                'name' => 'Elpuria',
                'img' => 'elpuria',
            ],
            [
                'name' => 'Kai\'en',
                'img' => 'kaien',
            ],
            [
                'name' => 'Michelle',
                'img' => 'michelle',
            ],
            [
                'name' => 'Rachid',
                'img' => 'rachid',
            ],
        ];


        foreach ($threeStars as $threeStar) {
            $mon = new Monster();
            $mon->setName($threeStar['name'])->setImage('/img/3nat/' . $threeStar['img'] . '.png');
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
            ],
        ];

        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/' . $fourStar['img'] . '.png');
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
            ],
        ];

        foreach ($fiveStars as $fiveStar) {
            $mon = new Monster();
            $mon->setName($fiveStar['name'])->setImage('/img/5nat/' . $fiveStar['img'] . '.png');
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