<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartThreeFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $twoStars = [
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
                'name' => 'Fairo',
                'img' => 'fairo',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Pigma',
                'img' => 'pigma',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Shaffron',
                'img' => 'shaffron',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_LIGHT")
            ],
            [
                'name' => 'Loque',
                'img' => 'loque',
                'family' => $this->getReference("lutinChampion"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Geoffrey',
                'img' => 'geoffrey',
                'family' => $this->getReference("viking"),
                'element' => $this->getReference("ELEM_FIRE")
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

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'part3'];
    }

    public function getDependencies()
    {
        return array(
            FamilyFixtures::class,
            ElementsFixtures::class
        );
    }
}