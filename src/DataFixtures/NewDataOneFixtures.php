<?php

namespace App\DataFixtures;

use App\Entity\Achievement;
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

        $titles = [
            [
                'name' => 'Pour un raid plus rapide',
                'text' => 'Monter une team R5 4DD',
                'image' => 'raid',
            ],
            [
                'name' => 'Homonculus Brutal',
                'text' => 'Terminer de monter l\'arbre de compétences de l\'homonculus attaque',
                'image' => 'homiee',
            ],
            [
                'name' => 'Homonculus Douillet (comme David)',
                'text' => 'Terminer de monter l\'arbre de compétences de l\'homonculus support',
                'image' => 'homied',
            ],
            [
                'name' => 'L&D Master',
                'text' => 'Monter 70 unités L&D 6*',
                'image' => 'dark_light',
            ],
            [
                'name' => 'Kaïo de Coubertin',
                'text' => 'Participer à un tournoi de guilde',
                'image' => 'arena',
            ],
        ];

        foreach($titles as $title) {
            $hf = new Achievement();
            $hf
                ->setName($title['name'])
                ->setText($title['text'])
                ->setImage($title['image'])
            ;

            $manager->persist($hf);

        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters', 'data1'];
    }
}