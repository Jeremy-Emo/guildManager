<?php

namespace App\DataFixtures;

use App\Entity\Element;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class ElementsFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $elements = [
            [
                'name' => 'Vent',
                'image' => 'wind',
                'ref' => 'ELEM_WIND',
            ],
            [
                'name' => 'Feu',
                'image' => 'fire',
                'ref' => 'ELEM_FIRE',
            ],
            [
                'name' => 'Eau',
                'image' => 'water',
                'ref' => 'ELEM_WATER',
            ],
            [
                'name' => 'Light',
                'image' => 'light',
                'ref' => 'ELEM_LIGHT',
            ],
            [
                'name' => 'Dark',
                'image' => 'dark',
                'ref' => 'ELEM_DARK',
            ]
        ];

        foreach ($elements as $element) {
            $elem = new Element();
            $elem->setName($element['name'])->setImage('/img/icons/' . $element['image'] . '.png');
            $manager->persist($elem);

            $this->setReference($elem['ref'], $elem);
        }
    }

    public static function getGroups(): array
    {
        return ['toProd', 'elements'];
    }
}