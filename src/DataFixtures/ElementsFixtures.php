<?php

namespace App\DataFixtures;

use App\Entity\Element;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

class ElementsFixtures extends Fixture implements FixtureGroupInterface
{
    public function load($manager)
    {
        $elements = [
            [
                'name' => 'Vent',
                'image' => 'wind',
                'ref' => 'ELEM_WIND',
                'id' => 3
            ],
            [
                'name' => 'Feu',
                'image' => 'fire',
                'ref' => 'ELEM_FIRE',
                'id' => 2
            ],
            [
                'name' => 'Eau',
                'image' => 'water',
                'ref' => 'ELEM_WATER',
                'id' => 1
            ],
            [
                'name' => 'Light',
                'image' => 'light',
                'ref' => 'ELEM_LIGHT',
                'id' => 4
            ],
            [
                'name' => 'Dark',
                'image' => 'dark',
                'ref' => 'ELEM_DARK',
                'id' => 5
            ]
        ];

        foreach ($elements as $element) {
            $elem = new Element();
            $elem->setName($element['name'])->setImage('/img/icons/' . $element['image'] . '.png')->setId($element['id']);
            $manager->persist($elem);

            $this->setReference($element['ref'], $elem);

            $metadata = $manager->getClassMetaData(get_class($elem));
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'pack1'];
    }
}