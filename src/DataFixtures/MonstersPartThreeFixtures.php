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
            ],
            [
                'name' => 'Jansson',
                'img' => 'jansson',
            ],
            [
                'name' => 'Walter',
                'img' => 'walter',
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
                'name' => 'Fairo',
                'img' => 'fairo',
            ],
            [
                'name' => 'Pigma',
                'img' => 'pigma',
            ],
            [
                'name' => 'Shaffron',
                'img' => 'shaffron',
            ],
            [
                'name' => 'Loque',
                'img' => 'loque',
            ],
            [
                'name' => 'Geoffrey',
                'img' => 'geoffrey',
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