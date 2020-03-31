<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartFiveFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $secondAwakes = [
            [
                'name' => 'Bernard',
                'img' => 'bernard',
            ],
            [
                'name' => 'Kahn',
                'img' => 'kahn',
            ],
            [
                'name' => 'Shamann',
                'img' => 'shamann',
            ],
            [
                'name' => 'Spectra',
                'img' => 'spectra',
            ],
            [
                'name' => 'Varus',
                'img' => 'varus',
            ],
        ];

        foreach ($secondAwakes as $secondAwake) {
            $mon = new Monster();
            $mon->setName($secondAwake['name'] . ' 2A')->setImage('/img/2a/' . $secondAwake['img'] . '.png');
            if(isset($secondAwake['family'])){
                $mon->setMonsterFamily($secondAwake['family']);
            }
            if(isset($secondAwake['element'])){
                $mon->setElement($secondAwake['element']);
            }
            $manager->persist($mon);
        }
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'part5'];
    }

    public function getDependencies()
    {
        return array(
            FamilyFixtures::class,
            ElementsFixtures::class
        );
    }
}