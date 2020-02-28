<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class MonstersPartThreeFixtures extends Fixture implements FixtureGroupInterface
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
            $manager->persist($mon);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'part3'];
    }
}