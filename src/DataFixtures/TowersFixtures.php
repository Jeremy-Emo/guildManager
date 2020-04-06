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
            $towerB = new SiegeTowers();
            $towerB->setColor('Bleue')->setNumber($i);
            $manager->persist($towerB);
            $towerR = new SiegeTowers();
            $towerR->setColor('Rouge')->setNumber($i);
            $manager->persist($towerR);
            $towerY = new SiegeTowers();
            $towerY->setColor('Jaune')->setNumber($i);
            $manager->persist($towerY);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'towers'];
    }
}