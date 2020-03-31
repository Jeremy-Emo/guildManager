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
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_WIND"),
                'stars' => 3,
            ],
            [
                'name' => 'Kahn',
                'img' => 'kahn',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_WATER"),
                'stars' => 3,
            ],
            [
                'name' => 'Shamann',
                'img' => 'shamann',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'stars' => 3,
            ],
            [
                'name' => 'Spectra',
                'img' => 'spectra',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_FIRE"),
                'stars' => 3,
            ],
            [
                'name' => 'Varus',
                'img' => 'varus',
                'family' => $this->getReference("griffon"),
                'element' => $this->getReference("ELEM_DARK"),
                'stars' => 3,
            ],
        ];

        foreach ($secondAwakes as $secondAwake) {
            $mon = new Monster();
            $mon->setName($secondAwake['name'] . ' 2A')->setImage('/img/2a/' . $secondAwake['img'] . '.png')->setNaturalStars($secondAwake['stars']);
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