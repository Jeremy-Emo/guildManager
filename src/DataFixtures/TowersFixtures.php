<?php

namespace App\DataFixtures;

use App\Entity\SiegeTowers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class TowersFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        for($i = 1; $i < 13; $i++){
            $tower = new SiegeTowers();
            $tower->setColor('blue')->setNumber($i);
            $manager->persist($tower);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'towers'];
    }
}