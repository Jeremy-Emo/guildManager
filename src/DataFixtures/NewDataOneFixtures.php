<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class NewDataOneFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $fourStars = [
            [
                'name' => 'Bering',
                'img' => 'bering',
            ],
        ];
        
        foreach ($fourStars as $fourStar) {
            $mon = new Monster();
            $mon->setName($fourStar['name'])->setImage('/img/4nat/' . $fourStar['img'] . '.png');
            $manager->persist($mon);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'data1'];
    }
}